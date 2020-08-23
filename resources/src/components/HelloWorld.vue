<template>
  <div>
    <h1>SOCKET IO</h1>
    <ul>
      <li v-for="(msg,index) in messages" v-bind:key="index">{{msg.text}}</li>
    </ul>
    <br />
    <input type="text" name id placeholder="Input Text" v-model="message" />
    <br />
    <button @click="send()">Send Message</button>
  </div>
</template>

<script>
import io from "socket.io-client/dist/socket.io";
let socket = io("http://localhost:3000");

export default {
  name: "HelloWorld",
  data() {
    return {
      message: "",
      messages: [],
    };
  },
  props: {
    msg: String,
  },
  methods: {
    send() {
      socket.emit("hello", 1, this.message);
    },
  },
  // created() {
  //   window.onbeforeunload = () => {
  //     socket.emit("leave", this.username);
  //   };

  //   socket.on("hello", (data) => {
  //     console.log(data);
  //     this.messages.push({
  //       text: data
  //     });
  //   });

  //   socket.on("typing", (data) => {
  //     this.typing = data;
  //   });

  //   socket.on("stopTyping", () => {
  //     this.typing = false;
  //   });

  //   socket.on("joined", (data) => {
  //     this.info.push({
  //       username: data,
  //       type: "joined",
  //     });

  //     setTimeout(() => {
  //       this.info = [];
  //     }, 5000);
  //   });

  //   socket.on("leave", (data) => {
  //     this.info.push({
  //       username: data,
  //       type: "left",
  //     });

  //     setTimeout(() => {
  //       this.info = [];
  //     }, 5000);
  //   });

  //   socket.on("connections", (data) => {
  //     this.connections = data;
  //   });
  // },
};
</script>
