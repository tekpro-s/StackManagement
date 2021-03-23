<template>
  <div>
    <table border="1">
      <tr>
        <th>テンプレートID</th>
        <th>タイトル</th>
        <th>時間（分）</th>
        <th>備考</th>
        <th></th>
        <th></th>
      </tr>
      <template v-for="(value, index) in templates">
        <tr :key="`first-${index}`">
          <td v-if="active[index]">{{ value.item.id }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.date" /></td> -->

          <td v-if="active[index]">{{ value.item.title1 }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.title" /></td> -->

          <td v-if="active[index]">{{ value.item.time1 }}分</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.time" /></td> -->

          <td v-if="active[index]">{{ value.item.comment1 }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.comment" /></td> -->
        </tr>
        <tr :key="`second-${index}`">
          <td v-if="active[index]">{{ value.item.id }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.date" /></td> -->

          <td v-if="active[index]">{{ value.item.title2 }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.title" /></td> -->

          <td v-if="active[index]">{{ value.item.time2 }}分</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.time" /></td> -->

          <td v-if="active[index]">{{ value.item.comment2 }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.comment" /></td> -->
        </tr>
        <tr :key="`third-${index}`">
          <td v-if="active[index]">{{ value.item.id }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.date" /></td> -->

          <td v-if="active[index]">{{ value.item.title3 }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.title" /></td> -->

          <td v-if="active[index]">{{ value.item.time3 }}分</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.time" /></td> -->

          <td v-if="active[index]">{{ value.item.comment3 }}</td>
          <!-- <td v-else><input type="text" v-model="stacks[index].item.comment" /></td> -->
        </tr>
      </template>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["id"],
  data() {
    return {
      active: [],
      templates: [],
    };
  },
  methods: {
    // 積み上げ取得
    async getTemplates() {
      let data = [];
      let active = [];
      const templates = await axios.get("/api/templates");

      await Promise.all(
        templates.data.data.map((d) => {
          axios.get("/api/templates/" + d.id).then((response) => {
            data.push(response.data);
            active.push(true);
          });
        })
      );
      this.templates = data;
      this.active = active;
      console.log(this.templates);
      console.log(this.active);
    },
  },
  // 画面表示時
  created() {
    this.getTemplates();
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

/* table th:after {
  display: block;
  content: "";
  width: 30px;
  height: 2px;
  right: 20px;
} */

table td {
  text-align: left;
  padding: 10px;
  width: 10%;
  border: solid 1px #fff;
  border-collapse: collapse;
}

table td:nth-last-child(1),
table td:nth-last-child(2) {
  width: 0px;
}

input {
  color: black;
}

button {
  color: black;
}
</style>