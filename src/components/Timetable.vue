<template>
    <section class="timetable">
        <table>
            <thead>
                <tr>
                    <th>Linie</th>
                    <th>Richtung</th>
                    <th>Abfahrt</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="line in timetable">
                    <td>{{ line.rt }}</td>
                    <td>{{ line.dest }}</td>
                    <td>
                        <time :datetime="formatDatetime(line.rdt.time)" v-html="departure(line)"></time>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>


<script>
export default {
    name: 'timetable',
    props: ['timetable'],
    data() {
        return {}
    },
    methods: {
        formatDatetime(timestamp) {
            return (new Date(timestamp)).toISOString()
        },
        departure(line) {
            const departureInMinutes = parseInt(line.dt)
            const departureTime = new Date(line.ddt.time)
            const expectedDepartureTime = new Date(line.sdt.time)

            const delayMinutes = Math.ceil((departureTime - expectedDepartureTime) / 1000 / 60)
console.log(delayMinutes)

            let result = ''
            if (departureInMinutes < 30) {
                result += '' + departureInMinutes + "'"
            } else {
                result += expectedDepartureTime.getHours() + ':' + expectedDepartureTime.getMinutes()
            }

            if (delayMinutes >= 1) {
                result += ' <span class="delay">(+' + delayMinutes.toFixed(0) + ')</span>'
            }

            return result
        }
    }
}
</script>


<style lang="scss">
.timetable {
    width: 100%;

    .delay {
        color: var(--textColorDelay);
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;

        td, th {
            padding: 0.25em 0.5em;
            margin: 0;
        }

        thead {
            th {
                text-align: left;
                background: var(--brandColor);
                color: white;
            }
        }

        tbody {
            > tr:nth-child(even) > td {
                background: var(--lightBackgroundColor);
            }
        }

        tr > :last-child {
            text-align: right;
        }
    }
}
</style>
