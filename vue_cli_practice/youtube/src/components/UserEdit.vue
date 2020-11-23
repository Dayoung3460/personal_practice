<template>
  <div class="yellow lighten-3 pa-3">
    <h3>회원 정보를 수정할 수 있습니다.</h3>
    <p>수정사항</p>
    <v-text-field
      label="Name"
      v-model="user.name"
    >
    </v-text-field>
    <v-text-field
      label="Address"
      v-model='user.address'
    >
    </v-text-field>
    <v-text-field
      label="Phone"
      v-model="user.phone"
    >
    </v-text-field>
    <v-radio-group v-model="user.hasDog">
      <v-radio
        label="I have a pet"
        :value="true"
      ></v-radio>
      <v-radio
        label="I don't have a pet"
        :value="false"
      ></v-radio>
    </v-radio-group>
    <v-btn @click="changeUser">Save</v-btn>
  </div>
</template>

<script>
  import { eventBus } from '../main.js'

  export default {
    props: ["name", "address", "phone", "hasDog"],
    data() {
      return {
        user: {}
      }
    },
    created() {
      this.user.name = this.name
      this.user.address = this.address
      this.user.phone = this.phone
      this.user.hasDog = this.hasDog
    },
    methods: {
      changeUser() {
        // child라는 에밋을 부모 컴포넌트로 보내.
        // this.user의 데이터와 함께
        this.$emit("child", this.user)

        // emit's first param is msg to parent's component
        // 형제 컴포넌트끼리도 가능. 사실 유저디테일이 가상의 부모 컴퍼넌트지
        // 유저에딧에서 날짜 데이터를 유저디테일로 보내는거라.
        // second is param of function
        // eventBus.$emit("userWasEdited", new Date())
        eventBus.userWasEdited(new Date())
      }
    }
  }
</script>
