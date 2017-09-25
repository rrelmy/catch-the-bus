<template>
    <div id="app">
        <main>
            <Timetable :timetable="timetable" />
        </main>
    </div>
</template>

<script>
    import Timetable from './components/Timetable.vue'

    export default {
        name: 'app',
        components: {
            Timetable
        },
        data() {
            return {
                timetable: []
            }
        },
        created() {
            console.log("Created")

            const url = 'http://localhost:8081/departures.php'
            const request = new Request(url)
            console.log("****", request.mode);

            fetch(request).then(function(response) {
                const contentType = response.headers.get("content-type")
                if(contentType && contentType.includes("application/json")) {
                    return response.json()
                }
                throw new TypeError("Oops, we haven't got JSON!")
            })
                .then(function(json) {
                    this.timetable = json;
                }.bind(this))
                .catch(function(error) { console.error(error); })
        }
    }
</script>

<style lang="scss">
    #app {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
</style>
