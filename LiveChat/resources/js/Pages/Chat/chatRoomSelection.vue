<template>
    <div class="grid grid-cols-2">
        <div class="font-bold text-xl">
            {{ selected.name }} Chat
        </div>
        <div>
            <select
                v-model="selected"
                class="float-right rounded-full"
                @change="$emit('roomChanged',selected)">
                <option v-for="(room,index) in chatRooms"
                        :key="index"
                        :value="room">
                    {{ room.name }}
                </option>

            </select>
        </div>
    </div>
</template>

<script>
export default {
    props: ['currentRoom', 'chatRooms'],
    data: function () {
        return {
            selected: '',
        }
    },
    created() {
        this.selected = this.currentRoom;
        // get current room where user is currently in

        }
}
</script>
