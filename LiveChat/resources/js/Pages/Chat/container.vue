<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <chat-room-selection
                    v-if="currentRoom.id"
                    :chatRooms="chatRooms"
                    :currentRoom="currentRoom"
                    v-on:roomChanged="setRoom($event)"
                />
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <message-container :messages="messages"/>
                    <input-message
                        :room="currentRoom"
                        v-on:messageSent="getMessages()"/>
                </div>
            </div>
        </div>
        <h2>Online User</h2>
        <li v-for="(user, index) in users" :key="index" class="py-2">
            {{ user.name }} <span v-if="(user.id === this.user.id)" class="text-gray-400">(You)</span>
<!--            <span v-if="(this.user.id)">room: {{ currentRoom }} </span>-->
            <!--            room: {{currentRoom}}-->
            {{currentRoom}}
        </li>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import MessageContainer from './messageContainer.vue'
import InputMessage from './inputMessage.vue'
import ChatRoomSelection from './chatRoomSelection.vue'

export default {
    components: {
        AppLayout,
        MessageContainer,
        InputMessage,
        ChatRoomSelection
    },
    data: function () {
        return {
            chatRooms: [],
            currentRoom: [],
            messages: [],
            users: [],
            user: [],

        }
    },
    watch: {
        currentRoom(val, oldVal) {
            if (oldVal.id) {
                this.disconnect(oldVal);
            }
            this.connect();
        }
    },
    methods: {
        connect() {
            if (this.currentRoom.id) {
                let vm = this;
                this.getMessages();
                window.Echo.private('chat.' + this.currentRoom.id)
                    .listen('NewChatMessage', e => {
                        vm.getMessages();
                    });
            }
        },
        disconnect(room) {
            window.Echo.leave('chat.' + room.id);
        },
        getRooms() {
            axios.get('/chat/rooms')
                .then(reponse => {
                    this.chatRooms = reponse.data;
                    this.setRoom(this.chatRooms[0]);
                })
                .catch(error => {
                    console.log(error);
                })
        },
        setRoom(room) {
            this.currentRoom = room;

        },
        getMessages() {
            axios.get('/chat/room/' + this.currentRoom.id + '/messages')
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        sendTypingEvent() {
            Echo.join('online')
                .whisper('typing', this.user);
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
        this.getRooms();
        Echo.join('online')
            .here(user => {
                this.users = user;
            })
            .joining(user => {
                this.users.push(user);
            })
            .leaving(user => {
                this.users = this.users.filter(u => u.id !== user.id);
            })
            .error(error => {
                console.log(error);
            })
            .listenForWhisper('typing', user => {
                this.activeUser = user;
                if (this.typingTimer) {
                    clearTimeout(this.typingTimer);
                }
                this.typingTimer = setTimeout(() => {
                    this.activeUser = false;
                }, 3000);

            });


    }
}
</script>
