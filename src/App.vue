<template>
    <div id="app">
        <main>
            <Timetable :timetable="timetable"/>
        </main>
    </div>
</template>

<script>
import Timetable from './components/Timetable.vue'

const BASE_URL = process.env.NODE_ENV === 'production' ? '' : 'http://localhost:8081';

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
    methods: {
        load() {
            const url = BASE_URL + '/departures.php'

            fetch(url)
                .then(function (response) {
                    const contentType = response.headers.get("content-type")
                    if (contentType && contentType.includes("application/json")) {
                        return response.json()
                    }
                    throw new TypeError("Oops, we haven't got JSON!")
                })
                .then(function (json) {
                    this.timetable = json;
                }.bind(this))
                .catch(function (error) {
                    console.error(error);
                })
        }
    },
    created() {
        this.load()

        setInterval(this.load, 1000 * 30)
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
