<template>
    <div class="container">
        <h1 class="title">Join a room !</h1>
        <ul class="navbar-nav ml-auto" v-for="room in rooms">
            <router-link :to="{name: 'room', params: {roomId: room.id }}" tag="li" class="nav-item" activeClass="active">
                <a class="nav-link">{{room.name}}</a>
            </router-link>
        </ul>
    
        <h6 class="subtitle">Create a new room :</h6>
        <div class="panel-form">
            <input id="btn-input" type="text" name="message" placeholder="Type your message" v-model="newRoom" @keyup.enter="createRoom">
            <span>
                <button class="btn btn-primary btn-sm" id="btn-chat" @click="createRoom">
                    Send
                </button>
            </span>
        </div>
    </div>
</template>


<script>
    import {mapState} from 'vuex';
    import {api} from "../../config";
    
    export default {

        data() {
            return {
                rooms: [],
                newRoom: ""
            }
        },

        created() {
            this.fetchRooms();
        },


        methods: {
            fetchRooms() {
                axios.get(api.room).then(response => {
                    this.rooms = response.data;
                });
            },

            createRoom() {
                axios.post(api.room, {name: this.newRoom}).then(response => {
                  this.fetchRooms()
                });

                this.newRoom = ''
            }
        }

    };

</script>
