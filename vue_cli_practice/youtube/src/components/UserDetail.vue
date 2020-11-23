<template>
  <div class="red lighten-3 pa-3">
    <h3>자세한 회원 정보를 확인합니다.</h3>
    <br>
    <p>**Details**</p>
    <v-card>
      <v-list-tile>
        <v-list-tile-content>
          Name:
        </v-list-tile-content>
        <v-list-tile-content class="align-end">
          {{ name }}
        </v-list-tile-content>
      </v-list-tile>
      <v-list-tile>
        <v-list-tile-content>
          Address:
        </v-list-tile-content>
        <v-list-tile-content class="align-end">
          {{ address }}
        </v-list-tile-content>
      </v-list-tile>
      <v-list-tile>
        <v-list-tile-content>
          Phone:
        </v-list-tile-content>
        <v-list-tile-content class="align-end">
          {{ phone }}
        </v-list-tile-content>
      </v-list-tile>
      <v-list-tile>
        <v-list-tile-content>
          Has she or he a dog?:
        </v-list-tile-content>
        <v-list-tile-content class="align-end">
          {{ hasDogKr }}
        </v-list-tile-content>
      </v-list-tile>
      <v-list-tile>
        <v-list-tile-content>
          Edited Date:
        </v-list-tile-content>
        <v-list-tile-content class="align-end">
          {{ editedDate }}
        </v-list-tile-content>
      </v-list-tile>
    </v-card>
  </div>
</template>

<script>
import { eventBus } from "../main"

export default {
  data() {
    return {
      editedDate: null
    }
  },
  // property 6 props 9 means that this component takes over 
  // variable nameOfChild from parent component.
  // value of props defined as array
  // Or 데이터 타입 기입해야 할때는 object타입{}으로.
  // 그 안에는 {변수명: 데이터 타입} 으로.
  // 값은 이미 부모 component에서 상속 받고 있기 때문.
  // props: {
  //   nameOfChild: {
  //     type: String,
  //     // required: true
  //     // if 부모 component is not inherited value, default value is the value.
  //     default: 'legoo'
  //   }
  // },
  props: ['name', 'address', 'phone', 'hasDog'],
  computed: {
    hasDogKr() {
      return this.hasDog === true ? 'Yes' : 'No'
    }
  },
  created() {
    // $on: eventBus의 eventListener 역할
    eventBus.$on('userWasEdited', (date) => {
      this.editedDate = date
    })
  },
}
</script>
