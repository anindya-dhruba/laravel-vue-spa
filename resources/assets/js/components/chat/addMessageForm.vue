<template>
    <div>
        <form @submit.prevent="addMessage">
            <div class="form-group">
                <label for="new-password">New Message</label>
                <input
                        type="text"
                        class="form-control"
                        :class="{'is-invalid' : error.new_message}"
                        id="new-password"
                        v-model="form.new_message"
                        :disabled="loading"
                />
                <div class="invalid-feedback" v-show="error.new_message">{{ error.new_message }}</div>
            </div>

            <button type="submit" class="btn btn-primary" :disabled="loading">
                <span v-show="loading">Adding Message</span>
                <span v-show="!loading">Add Message</span>
            </button>
        </form>
    </div>

</template>

<script>
    import {api} from "../../config";

    export default {
        name: "add-message-form",
        data() {
            return {
                loading: false,
                form: {
                    new_message: '',
                },
                error: {
                    new_message: '',
                }
            }
        },
        methods: {
            addMessage() {
                this.loading = true;
                var message = {body:this.form.new_message, room_id:"1"}
                axios.post(api.Message, message)
                    .then((res) => {
                        this.loading = false;
                        this.$noty.success('Message updated');
                        console.log(res)
                        this.$emit('addSuccess', res.data.message_obj)
                        this.form.new_message = ''
                    })
                    .catch(err => {
                        (err.response.data.error) && this.$noty.error(err.response.data.error);

                        (err.response.data.errors)
                            ? this.setErrors(err.response.data.errors)
                            : this.clearErrors();

                        this.loading = false;
                        this.form.new_message = ''
                    });
            },
            setErrors(errors) {
                this.error.new_message = errors.new_message ? errors.new_message[0] : null;
            },
            clearErrors() {
                this.error.new_message = null;
            }
        }
    }
</script>

<style scoped>

</style>