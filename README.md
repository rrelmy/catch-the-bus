# Catch the bus

Unofficial API description!

---

# API Documentation

Based on the [RB Lenzburg](https://www.rbl.ch/home/) App

App was developed by [Glue](https://www.glue.ch/)

## Configuration

- Base-URL: http://www.mezi.ch/rbl/
 
### Default Parameters

- userID: _(some hex id)_
- language: de
- app: vbsh
- client: android 

## Endpoints

### `/masterData`

``` json
{
    "linien": {
        "revision": "16",
        "date": 1497517097,
        "url": "https://s3-eu-west-1.amazonaws.com/mezi-lenzburg/linien.lenz.20170614.json"
    },
    "haltestellen": {
        "revision": "16",
        "date": 1497517097 ,
        "url": "https://s3-eu-west-1.amazonaws.com/mezi-lenzburg/haltestellen.lenz.20170614.json"
    }
}
```

### `/messages`

``` json
{
  "response": {
    "incidences": [
      {
        "st": "Infolge von Bauarbeiten werden die Haltestellen Dintikon, Dorfstrasse, Dintikon, Oberdorf und Dintikon, Post nicht bedient.",
        "lt": "Infolge von Bauarbeiten werden die Haltestellen Dintikon, Dorfstrasse, Dintikon, Oberdorf und Dintikon, Post nicht bedient.",
        "t": "Haltestelle nicht bedient",
        "info": "Infolge von Bauarbeiten werden die Haltestellen Dintikon, Dorfstrasse, Dintikon, Oberdorf und Dintikon, Post nicht bedient.",
        "web": false,
        "site": false,
        "stele": true,
        "monitor": false,
        "mobile": true,
        "betrieb": false,
        "sms": false,
        "id": "588f122fe4b0af633bec5eb0",
        "from": {
          "time": 1485903540000,
          "timezone": "Europe\/Zurich"
        },
        "until": {
          "time": 1506722280000,
          "timezone": "Europe\/Zurich"
        },
        "update": {
          "time": 1505938308678,
          "timezone": "Europe\/Zurich"
        },
        "hideEndtime": false
      }
    ]
  }
}
```

### `/departures/:departureStationId[/:targetStationId]`

#### Parametes:
- vehicle: 63
- time: 22%3A05
- line=393
- destination=Lenzburg+Bahnhof+via+Othmarsingen 

``` json
{
  "response": {
    "departures": [
      {
        "rt": "382",
        "lineInfo": {
          "fgc": 16777215,
          "fgcHex": "ffffff",
          "bgc": 15605027,
          "bgcHex": "ee1d23",
          "borderColor": 16777215,
          "borderColorHex": "ffffff",
          "vehicle": 1,
          "direction": "R"
        },
        "dest": "Lenzburg Hypiplatz via M\u00f6riken",
        "stp": "M\u00e4genwil, Bahnhof",
        "stopInfo": {
          "hid": "77353",
          "kid": "77353_A",
          "lat": 47.414268493652,
          "lon": 8.2349891662598,
          "perron": "A",
          "direction": "",
          "name": "M\u00e4genwil, Bahnhof"
        },
        "pred": true,
        "ddt": {
          "time": 1505939520000,
          "timezone": "Europe\/Zurich"
        },
        "rdt": {
          "time": 1505938307658,
          "timezone": "Europe\/Zurich"
        },
        "sdt": {
          "time": 1505939520000,
          "timezone": "Europe\/Zurich"
        },
        "dt": "20min",
        "id": "000873_05035_1;2017-09-20",
        "msgs": [
          
        ],
        "msgsSites": [
          
        ],
        "trafficJam": false,
        "atStation": false,
        "cancelled": false,
        "finished": false,
        "hasRealtime": true,
        "needsReservation": false
      }
    ]
  }
}
```

### `/course/:id;:date`

- :id: 000873_05039_1
- :date: 2017-09-20

- courseId: 05039

``` json
{
  "response": {
    "verlauf": {
      "richtung": "Lenzburg, Hypiplatz                               ",
      "fahrtid": "000873_05039",
      "haltid": "000873_05039_1",
      "haltestelle": "M\u00e4genwil, Bahnhof",
      "abfahrt": "142'",
      "lineInfo": {
        "fgc": 16777215,
        "fgcHex": "ffffff",
        "bgc": 15605027,
        "bgcHex": "ee1d23",
        "borderColor": 16777215,
        "borderColorHex": "ffffff",
        "vehicle": 1,
        "direction": "R"
      },
      "requesttime": 1505938152938,
      "operator": {
        "backgroundColor": 255,
        "foregroundColor": 16777215,
        "external_id": "000873",
        "name": "Regionalbus Lenzburg"
      },
      "linie": "382",
      "stops": [
        {
          "kantenId": "77353_A",
          "hid": "77353",
          "name": "M\u00e4genwil, Bahnhof",
          "soll": 1505946720000,
          "ist": 1505946720000,
          "late": 0,
          "displayTime": "142'",
          "haltId": "000873_05039_1",
          "pred": false,
          "longitude": 8.2349891662598,
          "perron": "A",
          "latitude": 47.414268493652
        },
        {
          "kantenId": "78747_B",
          "hid": "78747",
          "name": "Lenzburg, Hypiplatz",
          "soll": 1505948220000,
          "ist": 1505948220000,
          "late": 0,
          "displayTime": "167'",
          "haltId": "000873_05039_17",
          "pred": false,
          "longitude": 8.178409576416,
          "perron": "B",
          "latitude": 47.387760162354
        }
      ],
      "late": 0,
      "pred": false,
      "abfahrtAbsolute": 1505946720000,
      "zugNr": "05039",
      "attributes": [
        
      ]
    }
  }
}
```
