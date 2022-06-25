<template>
    <div class="relative h-10 m-1">
        <div class="grid grid-cols-6"
             style="border-top: 1px solid #e6e6e6;">
            <JetInput
                v-model="message"
                autofocus
                class="col-span-5 outline-none p-1"
                placeholder="New Message"
                type="text"
                @keydown="sendTypingEvent()"
                @keyup.enter="sendMessage()"
            />
            <button class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white"
                    @click="sendMessage()">
                Send
            </button>
        </div>
    </div>
    ... <span v-if="activeUser" class="text-muted"> {{ activeUser.user.name }} is typing...</span>

</template>

<script>
export default {

    props: ['room'],
    data: function () {
        return {
            message: '',
            activeUser: false,
            typingTimer: false,
            user: [],
        }
    },
    methods: {
        sendTypingEvent() {
            Echo.join(`online`)
                .whisper('typing', {
                    user: this.user,
                    room_id: this.room.id,
                });
        },
        sendMessage() {
            if (this.message === '') {
                return;
            }
            axios.post('/chat/room/' + this.room.id + '/message', {
                message: this.message,
            })
                .then(response => {

                        this.message = '';
                        this.$emit('messageSent');

                })
                .catch(error => {
                    console.log(error);
                })
        },
        getAuthUser() {
            axios.get('/auth/user')
                .then(response => {
                    if (response.status === 200) {
                        this.user = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        },
    },

    created() {
        this.getAuthUser();
        Echo.join('online')
            .listenForWhisper('typing', (e) => {
                if (e.room_id === this.room.id) {
                    this.activeUser = e;
                    if (this.typingTimer) {
                        clearTimeout(this.typingTimer);
                    }
                    this.typingTimer = setTimeout(() => {
                        this.activeUser = false;
                    }, 2300);
                }
            })
    }
}
</script>

<script setup>
import JetInput from '@/Jetstream/Input.vue';
</script>
