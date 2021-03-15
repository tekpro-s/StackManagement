<template>
  <div>
    <table border="1">
      <tr>
        <th>タイトル</th>
        <th>時間（分）</th>
        <th>備考</th>
      </tr>
      <tr v-for="(value, index) in stacks" :key="index">
        <td>{{ value.item.title }}</td>
        <td>{{ value.item.time }}分</td>
        <td>{{ value.item.comment }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["id"],
  data() {
    return {
      stacks: [],
      path: true,
      profile: true,
    };
  },
  methods: {
    // 積み上げ取得
    async getStacks() {
      let data = [];
      const stacks = await axios.get("http://localhost:8000/api/stacks");
      // const stacks = await axios.get(
      //   "https://fast-shore-97226.herokuapp.com/api/stacks"
      // );
      for (let i = 0; i < stacks.data.data.length; i++) {
        await axios
          .get("http://localhost:8000/api/stacks/" + stacks.data.data[i].id)
          // .get(
          //   "https://fast-shore-97226.herokuapp.com/api/stacks" +
          //     stacks.data.data[i].id
          // )
          .then((response) => {
            data.push(response.data);
          });
      }
      this.stacks = data;
      console.log(this.stacks);
    },
  },
  // 画面表示時
  created() {
    this.getStacks();
  },
};
</script>

<style scoped>
.flex {
  display: flex;
}
.icon {
  width: 25px;
  height: 25px;
}
.detail {
  margin-left: 50px;
}
.message {
  padding: 20px;
  border-bottom: solid 1px white;
  border-left: solid 1px white;
}
.name {
  font-size: 18px;
  font-weight: bold;
  margin-right: 10px;
}
.text {
  margin-top: 10px;
}
.number {
  margin-left: 10px;
  margin-right: 10px;
}
table {
  width: 100%;
  border: solid 1px #fff;
  border-collapse: collapse;
}

table th {
  position: relative;
  text-align: left;
  border: solid 1px #fff;
  padding: 10px;
  width: 10%;
}

table th:after {
  display: block;
  content: "";
  width: 30px;
  height: 2px;
  right: 20px;
}

table td {
  text-align: left;
  padding: 10px;
  width: 30%;
  border: solid 1px #fff;
  border-collapse: collapse;
}
</style>