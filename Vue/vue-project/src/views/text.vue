<!-- 
説明ー
<template> - viewの当たるhtmlコードを作成するところ
name - componentの名前、つけなくてもいい
components - componentをimportしたらこっちで使える
data
setup -
created
mounted - templateに作成したコードがrendering後実行される。
unmounted - componentから出るとき使う
methods - componentで使うmethod定義するところ
preferences -> user snippets -> vue
	"Generate Basic Vue Code":{
		"prefix":"vue-start",
		"body": [
			"<template>\n<div></div>\n</template>\n<script>\n\nexport default{ \n\tname:'',\n\tcomponents:{},\n\tdata(){\n\t\treturn{\n\t\t\tsampleData:''\n\t\t};\n\t},\n\tbeforceCreate(){},\n\tsetup(){},\n\tcreated(){},\n\tbeforceMount(){},\n\tbeforceUpdate(){},\n\tmounted(){},\n\tupdated(){},\n\tbeforceUnmount(){},\n\tunmounted(){},\n\tmethods:{}\n}\n</script>"
		],
		"description": "Generate Basic Vue Code"
	}

    <input @keyup.enter="submit" />
    これを利用してキーボードのイベント発生をつくる
    .enter, .up, .tab, .down, .delete, .left, .esc, .right, .space

    Axios -HTTP美同期通信library- Promise客体でreturn

    proxy server - clientがほかのネットに間接的に接続できるようにするプログラム
    つまりserver-clientの間で通信を行うプログラムがproxyその機能がproxyserverでいう
-->

<template>
<div></div>
</template>
<script>

export default{ 
    name:'',
    components:{},
    data(){
        return{
            sampleData:''
        };
    },
    beforceCreate(){},
    setup(){},
    created(){},
    beforceMount(){},
    beforceUpdate(){},
    mounted(){},
    updated(){},
    beforceUnmount(){},
    unmounted(){},
    methods:{}
}
</script>