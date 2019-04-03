<template>
    <div>
        <h3 class="mb-4">Message Board</h3>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li v-bind:class="{ textRight: message.email == user.email }" class="list-group-item"
                    v-bind:key="message.id" v-for="message in messages">
                    <div v-show="update_id !== message.id">
                        {{message.name}}: {{message.body}}
                        <button v-show="message.email == user.email" class="btn btn-danger float-left" @click="deleteMessage(message)">
                            <span>Delete</span>
                        </button>
                        <button v-show="message.email == user.email"
                                class="btn btn-success margin-left-small float-left" @click="updateClicked(message)">
                            <span>Update</span>
                        </button>
                    </div>
                    <div v-show="update_id === message.id">
                        <input
                                type="text"
                                class="form-control partial-form float-right"
                                :class="{'is-invalid' : error.new_message}"
                                id="new-message"
                                v-model="form.new_message"
                                :disabled="loading"
                        />
                        <button
                                class="btn btn-success margin-left-small float-left" @click="updateMessage()">
                            <span>Update</span>
                        </button>
                    </div>
                </li>

            </ul>
        </div>
        <div class="card" v-show="update_id === -1">
            <div class="card-body">
                <add-message-form @addSuccess="addSuccess"></add-message-form>
            </div>
        </div>
    </div>

</template>

<script>
    import AddMessageForm from "./addMessageForm";
    import {mapState} from 'vuex';
    import {api} from "../../config";


    export default {
        components: {AddMessageForm},
        name: "room",
        data() {
            return {
                messages: [],
                update_id: -1,
                loading: false,
                form: {
                    new_message: '',
                },error: {
                    new_message: '',
                }
            }
        },
        methods: {
            getMessages() {
                axios.get(api.getMessages)
                    .then(res => {
                        this.messages = res.data.data.reverse()
                    }).catch(err => console.log(err));
            },
            addSuccess(message) {
                this.messages.push(message)
                this.$router.push({name: 'room'});
            },
            updateClicked(message) {
                this.update_id = message.id;
                this.form.new_message = message.body
                console.log(this.update_id)
            },
            updateMessage(){
                console.log(this.form.new_message)
                this.loading = true;
                var message = {body:this.form.new_message, room_id:"1"}
                axios.put(api.Message+"/"+this.update_id, message)
                    .then((res) => {
                        this.loading = false;
                        this.$noty.success('Message updated');
                        for (var i = 0; i < this.messages.length; i++) {
                            if (this.messages[i].id == res.data.message_obj.id){
                                this.messages[i] = res.data.message_obj;
                            }
                        }
                        this.form.new_message = '';
                        this.update_id = -1;
                        return;
                    })
                    .catch(err => {
                       console.log(err)
                        this.loading = false;
                        this.form.new_message = '';
                        this.update_id = -1;
                    });
            },
            deleteMessage(message) {
                axios.delete(api.Message+"/"+message.id)
                    .then((res) => {
                        this.loading = false;
                        this.$noty.success('Message Deleted');
                        for (var i = 0; i < this.messages.length; i++) {
                            if (this.messages[i].id == res.data.message_obj.id){
                                this.messages.splice(i,i+1);
                                break;
                            }
                        }
                        this.form.new_message = '';
                        this.update_id = -1;
                        return;
                    })
                    .catch(err => {
                        console.log(err)
                        this.loading = false;
                        this.form.new_message = '';
                        this.update_id = -1;
                    });
            }
        },
        created() {
            this.getMessages()
        },
        computed: mapState({
            user: state => state.auth
        })
    }
</script>

<style scoped>
    .textRight {
        text-align: right;
    }

    .float-left {
        float: left;
    }
    .float-right{
        float: right;
    }

    .margin-left-small {
        margin-left: 10px;
    }
    .partial-form{
        width: 80%;
    }
</style>