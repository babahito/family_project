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
            <v-btn text to="/logout">logout</v-btn>
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
		<h1>管理者一覧</h1>

		<v-simple-table>
			<template v-slot:default>
			<thead>
				<tr>
					<th class="text-left">名前</th>
					<th class="text-left">メールアドレス</th>
					<th class="text-left">詳細</th>
					<th class="text-left">編集</th>
					<th class="text-left">削除</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(user,index) in users" v-bind:key="index">
					<td>{{ user.name }}</td>
					<td>{{ user.email }}</td>
					<td><router-link :to="`/shop/user/${user.id}`"><v-icon>mdi-details</v-icon></router-link></td>
					<td><router-link :to="`/shop/user/${user.id}/edit/`"><v-icon>mdi-pencil-outline</v-icon></router-link></td>
					<td><button class="btn btn-danger" v-on:click="userDelete(index, user.id)"><v-icon>mdi-delete-empty-outline</v-icon></button></td>		  
				</tr>
			</tbody>
			</template>
		</v-simple-table>


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
      users:[],
        drawer: null,
        supports:[
          {
            name:'TOP',
            icon:'mdi-home',
            link:'/shop/home'
          },
          {
            name:'customers',
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
            name:'customers',
            icon:'mdi-account-group',
            link:'/shop/user'
            },
        ],
    }
  },
  	created(){
		axios.get('/api/home')
		.then(response=>{
			this.users=response.data.users;
			// this.tabledate=response.data.users;
		})
		.catch(error =>{
			console.log(error)
		});
	}
}
</script>
