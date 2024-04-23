#ROUTES

##GET

GET /quizzes
GET /quiz/{id}
GET /domande
GET /domanda/{id}
GET /risposte
GET /risposta/{id}


##POST
Ritorna l'oggetto inserito (incluso id nel database)

POST /quiz
esempio body:
```
{
    "nome": "quiz",
    "descrizione": "descrizione quiz",
    "punteggio": "100",
    "domande":[
        {
            "domanda": "test",
            "punti": "5",
            "risposte": [
                {
                    "risposta": "test",
                    "corretta": "0"
                },
                {
                    "risposta": "test",
                    "corretta": "1"
                }
            ]
        },
        {
            "domanda": "test",
            "punti": "5",
            "risposte": [
                {
                    "risposta": "test",
                    "corretta": "0"
                },
                {
                    "risposta": "test",
                    "corretta": "1"
                }
            ]
        }
    ]
}
```


POST /domanda
esempio body:
```
{
"id_quiz": "1",
"domanda": "test",
    "punti": "5",
    "risposte": [
        {
            "risposta": "test",
            "corretta": "0"
        },
        {
            "risposta": "test",
            "corretta": "1"
        }
    ]
}
```

POST /risposta
esmepio body:
```
{
    "id_domanda": "2",
    "risposta": "test",
	"corretta": "0"
}
```





PUT
(è obbligatorio mettere solo l'id e i campi da modificare)
Ritporna l'oggetto con i campi modificati

PUT /quiz
esempio body:
```
{
	"id_quiz": "1",
	"nome": "quiz",
	"descrizione": "descrizione quiz",
	"punteggio": "100"
}
```
(obbligatorio mettere solo l'id e i campi da modificare)


PUT /domanda
esempio body:
```
{
	"domanda": "test",
        "punti": "5"
}
```

PUT /risposta
esempio body:
```
{
	"risposta": "test",
        "corretta": "0"
}
```
