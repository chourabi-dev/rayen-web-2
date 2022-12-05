const express = require('express');
const { ObjectId } = require('mongodb');
const app = express()
const port = 3000
const url = require("url");

// insert TEAM
/**
 * [
 * {
 *  name:"fc barce",
 *  players:[
 *      { name:"Ronaldo", number:7 },
 *      { name:"Ronaldo", number:7 },
 *      { name:"Ronaldo", number:7 },
 *      { name:"Ronaldo", number:7 },
 * 
 *  ]
 * }
 * 
 * ]
 */

app.post('/teams', (req, res) => {

    const client = require("mongodb").MongoClient;


    client.connect("mongodb://localhost:27017").then((server)=>{
        const db = server.db("tprayen");


        let body = [];
        req.on("data",(chunk)=>{
            body.push(chunk);
        }).on("end",()=>{
            const document = JSON.parse( Buffer.concat(body).toString() );

            db.collection("teams").insertOne(document).then((insert)=>{
                res.send({ success:true, message:"team inserted successfully" })
            })
        })


        
    })


})





app.get('/teams', (req, res) => {

    const client = require("mongodb").MongoClient;

    client.connect("mongodb://localhost:27017").then((server)=>{
        const db = server.db("tprayen");

        const id = url.parse(req.url,true).query.id;

        if (id != null) {
            db.collection("teams").find({ _id: ObjectId(id) }).toArray().then((teams)=>{
               
                res.send(teams[0]);
            }) 
        }else{
            db.collection("teams").find({}).toArray().then((teams)=>{
                console.log(teams);
                res.send(teams);
            })
        }

        
    })


})




app.put('/teams', (req, res) => {

    const client = require("mongodb").MongoClient;


    client.connect("mongodb://localhost:27017").then((server)=>{
        const db = server.db("tprayen");


        let body = [];
        req.on("data",(chunk)=>{
            body.push(chunk);
        }).on("end",()=>{
            const document = JSON.parse( Buffer.concat(body).toString() );


            const id = url.parse(req.url,true).query.id;

            db.collection("teams").updateOne( { _id: ObjectId(id) }, { $set: document }  ).then((insert)=>{
                res.send({ success:true, message:"team updated successfully" })
            })
        })


        
    })


})






app.delete('/teams', (req, res) => {

    const client = require("mongodb").MongoClient;


    client.connect("mongodb://localhost:27017").then((server)=>{
        const db = server.db("tprayen");
 

            const id = url.parse(req.url,true).query.id;

            db.collection("teams").deleteOne( { _id: ObjectId(id) }  ).then((insert)=>{
                res.send({ success:true, message:"team deleted successfully" })
            })
       

        
    })


})






app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})