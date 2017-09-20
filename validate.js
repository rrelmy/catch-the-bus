const Validator = require('jsonschema').Validator

const files = [
    {
        data: require('./data/haltestellen.lenz.20170614.json'),
        schema: require('./schema/stations.json')
    },
    {
        data: require('./data/linien.lenz.20170614.json'),
        schema: require('./schema/lines.json')
    },
    {
        data: require('./data/masterdata.json'),
        schema: require('./schema/masterdata.json')
    },
    {
        data: require('./data/messages.json'),
        schema: require('./schema/messages.json')
    },
    {
        data: require('./data/departures.json'),
        schema: require('./schema/departures.json')
    }
];

const opts = {throwError: false};

files.forEach(function (def) {
    const v = new Validator()
    const r = v.validate(def.data, def.schema, opts)
    if (r.valid) {
        console.info("You are good to go!")
    } else {
        console.error(r.errors)
    }
});
