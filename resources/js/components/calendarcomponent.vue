<template>
    <div class="container">
        <full-calendar 
            :events="calendarEvents"
            :header="{
                    left: 'prev, next today',
                    center: 'title',
                    right: 'dayGridMonth, timeGridWeek, timeGridDay, listWeek',
                }"
        >
        </full-calendar>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                calendarEvents: [{
                    events(start, end, timezone, callback) {
                        axios.get('http://localhost:8000/show-events').then(res => {
                            callback(res.data.eventList)
                        })
                    },
                    color: 'blue',
                    textColor: 'white',
                }]
            }
        }
    }
</script>