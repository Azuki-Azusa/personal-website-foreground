<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="日语, 日文, 歌词, 假名, 标注, 动画, anisong, 日文歌">
	<meta name="Description" Content="Azu機个人网站 假名标注">
	<title>{{ $lyric->title }} 歌词假名标注</title>
	<!-- import CSS -->
	<link rel="stylesheet" href="{{URL::asset('assets/element-ui/lib/theme-chalk/index.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/highlight/styles/default.css')}}">
	<style>
		code {
            color: #f66;
		}

		.lyricContent {
			moz-user-select: -moz-none;
			-moz-user-select: none;
			-o-user-select:none;
			-khtml-user-select:none;
			-webkit-user-select:none;
			-ms-user-select:none;
			user-select:none;
		}

		img{
			max-width: 100%;
			display : block;
			margin: 0 auto
		}
		
		[v-cloak] {
			display: none;
		}
	</style>
</head>

<body>
	<div id="app" v-cloak>
		<el-container>
			<el-header style="margin:0px 0px 50px">
				<el-row>
					<el-col :span="2">
						<div class="grid-content bg-purple">
							<h2><el-link :underline="false" type="success" href="/">HomePage</el-link></h2>
						</div>
					</el-col>
					<el-col :span="2">
						<div class="grid-content bg-purple">
							<h2><el-link :underline="false" type="success" href="/lyric/1">LyricList</el-link></h2>
						</div>
					</el-col>
					<el-col :span="16">
						<h2 style="text-align:center;" class="grid-content bg-purple">{{ $lyric->title }}</h2>
						<div style="text-align:center;">
							<span style="margin: 0px 30px">{{ $lyric->datetime }}</span>
							<i class="el-icon-view">{{ $lyric->views }}</i>
						</div>
					</el-col>
					<el-col :span="2">
						<h2>by Azu機</h2>
					</el-col>
					<el-col :span="2" style="text-align: right">
						<div><el-link :underline="false" type="primary" target="_blank" href="https://twitter.com/c980129">Twitter</el-link></div>
						<div><el-link :underline="false" type="danger" target="_blank" href="https://weibo.com/cj980129">Weibo</el-link></div>
					</el-col>
						
					</el-col>
				</el-row>
				<el-divider></el-divider>
			</el-header>
			<el-main>
				<el-row>
					<el-col :span="18" :offset="3">
						<el-container direction="vertical">
							<el-main class="lyricContent">{!! $lyric->html !!}</el-main>
						</el-container>
					</el-col>
				</el-row>
			</el-main>
		</el-container>
	</div>
	<!-- import Vue before Element -->
	<script src="{{URL::asset('assets/vue/dist/vue.min.js')}}"></script>
	<!-- import JavaScript -->
	<script src="{{URL::asset('assets/element-ui/lib/index.js')}}"></script>
	<script>
		new Vue({
			el: '#app',
		})

		
	</script>
</body>

</html>