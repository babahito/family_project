<template>
  <v-app>
    <!-- 左のリスト -->
    <v-navigation-drawer app v-model="drawer" clipped >
      <v-container>
        <!-- TOPタイトル部分 -->
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title class="title gray-text text--darken-2">
              管理者メニュー
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-divider></v-divider>
        <!-- リスト部分 -->
        <v-list dense nav>
          <v-list-item v-for="nav_list in nav_lists" :key="nav_list.name" :to="nav_list.link">
            <v-list-item-icon>
              <v-icon>{{ nav_list.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>{{ nav_list.name }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
      </v-list>

      </v-container>
   </v-navigation-drawer>


    <!-- ヘッダー -->
      <v-app-bar color="dark" dark app clipped-left>
        <!-- ハンバーガーメニュー -->
        <v-app-bar-nav-icon @click="drawer=!drawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Family Note管理画面</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
        <v-btn text to="/user">login</v-btn>
        <v-menu offset-y>
          <template v-slot:activator="{on}">
          <v-btn v-on="on" text>Admin<v-icon>mdi-home</v-icon></v-btn>
          </template>
          <v-list>
            <v-list-item v-for="support in supports" :key="support" :to="support.link">
              <v-list-item-icon>
              <v-icon>{{ support.icon }}</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
              <v-list-item-title>{{ support.name }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-menu>
        </v-toolbar-items>
      </v-app-bar>

    <!-- メイン -->
    <v-main>
		ユーザー情報持ってきたい
      <router-view />
    </v-main>
    <!-- フッター -->
      <v-footer color="dark" dark app>
      Family Note
      </v-footer>
  </v-app>
</template>

<script>
export default {
  data(){
    return{
        drawer: null,
        supports:[
          {
            name:'TOP',
            icon:'mdi-home',
            link:'/shop/home'
          },
          {
            name:'user',
            icon:'mdi-account-group',
            link:'/shop/user'
            },
        ],
        nav_lists:[
          {
            name:'top',
            icon:'mdi-home',
            link:'/shop/home'
          },
          {
            name:'user',
            icon:'mdi-account-group',
            link:'/shop/user'
            },
        ],
    }
  }
}
</script>
