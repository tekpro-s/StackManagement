<template>
  <div class="stack">
    <p>積み上げ</p>
    <div>
      <input placeholder="タイトル" v-model="title" />
      <input placeholder="時間（分）" v-model="time" />
      <input placeholder="備考" v-model="comment" />
      <div @click="send">
        <button>投稿する</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      title: "",
      time: "",
      comment: "",
    };
  },
  methods: {
    send() {
      if (this.title === "") {
        alert("積み上げ内容を入力してください");
      } else if (this.time === "") {
        alert("時間（分）を入力してください");
      } else {
        console.log(this.$store.state.user.id);
        axios
          .post("http://localhost:8000/api/stacks/", {
            user_id: this.$store.state.user.id,
            title: this.title,
            time: this.time,
            comment: this.comment,
          })
          .then((response) => {
            console.log(response);
            alert("投稿しました");
            this.share = "";
            this.$router.go({
              path: this.$router.currentRoute.path,
              force: true,
            });
          });
      }
    },
  },
};
</script>

<style scoped>
.stack {
  margin: 15px;
}
.stack input {
  width: 95%;
  height: 30px;
  margin-top: 5px;
  margin-bottom: 15px;
  margin-left: 10px;
  border-radius: 10px;
  border: 1px solid white;
  background-color: #15202b;
  color: white;
}
button {
  width: 100px;
  text-align: center;
  padding: 8px 0 10px;
  color: #fff;
  background-color: #5419da;
  border-radius: 25px;
  display: block;
  margin: 0 0 0 auto;
}
</style>