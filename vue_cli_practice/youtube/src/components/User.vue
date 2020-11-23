<template>
  <div class="blue lighten-3 pa-3">
    <h1>User 컴포넌트</h1>
    <p>이름: {{ name }}</p>
    <v-btn @click='changeName()' color="primary">
      Change Name
    </v-btn>
    <hr>
    <v-layout row wrap>
      <v-flex xs12 sm6>
        <!-- child component takes over from parent component -->
        <!-- UserDetail component has a variable 'nameOfChild' 
        and this value takes variable 'name' in parent component -->
        <!-- meaning that variable 'name' is shared. -->
        <UserDetail 
          :name="name"
          :address="address"
          :phone="phone"
          :hasDog="hasDog"
        >
        </UserDetail>
      </v-flex>
      <v-flex xs12 sm6>
        <!-- child라는 메세지를 자식 component한테 받아왔을 때 parents라는 함수를 실행시켜라 -->
        <UserEdit
          :name="name"
          :address="address"
          :phone="phone"
          :hasDog="hasDog"
          @child="parents"
        ></UserEdit>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import UserDetail from "./UserDetail.vue"
import UserEdit from "./UserEdit.vue"

export default {
  components: {
    UserDetail,
    UserEdit
  },
  data() {
    return {
      name: 'dy',
      address: 'Deagu',
      phone: '010-2344-2342',
      hasDog: true
    }
  },
  methods: {
    // param이 object임.
    parents(user) {
      this.name = user.name
      this.address = user.address
      this.phone = user.phone
      this.hasDog = user.hasDog
      console.log('parent got it')
    }
  }
}

</script>