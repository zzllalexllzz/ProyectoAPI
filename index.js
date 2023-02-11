const mongoose = require("mongoose");
const app = require("./app");
const port = 3000;
const urlMongo = "mongodb+srv://usuario:usuario-159@cluster0.vqzky9s.mongodb.net/test";
//const urlMongo = "mongodb://root:toor@localhost:27017/test";

mongoose.set('strictQuery', false);

mongoose.connect(urlMongo,{
  useNewUrlParser:true,
  useUniFiedTopology:true
},(err,res)=>{
  try {
    if (err) {
      throw err;
    } else {
      console.log("Conectado a mongo, ok.");

      //servidor web de node.js
      app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
      })
    }
  } catch (error) {
    console.error(error);
  }
})

