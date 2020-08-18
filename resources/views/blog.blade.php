<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="BLOG, 博客, IT, 计算机, 编程">
	<meta name="Description" Content="Azu機个人博客">
	<title>{{ $blog->title }}</title>
	<!-- import CSS -->
	<link rel="stylesheet" href="{{URL::asset('assets/element-ui/lib/theme-chalk/index.css')}}">
	<style>
		code {
            color: #f66;
		}

		.blogContent {
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
							<h2><el-link :underline="false" type="success" href="/bloglist">BlogList</el-link></h2>
						</div>
					</el-col>
					<el-col :span="16">
						<h2 style="text-align:center;" class="grid-content bg-purple">{{ $blog->title }}</h2>
						<div style="text-align:center;">
							<span style="margin: 0px 30px">{{ $blog->datetime }}</span>
							<i class="el-icon-view">{{ $blog->views }}</i>
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
							<el-main class="blogContent">{!! $blog->html !!}</el-main>
							<el-main style="margin:50px">
								<el-divider></el-divider>
								<el-container>
									<el-header><h3>Comments:</h3></el-header>
									<el-main>
										<div class="block">
											<el-timeline>
												@for ($i = 0; $i < count($comments); $i ++)
												<el-timeline-item timestamp="{{ $comments[$i]->datetime }}" placement="top">
												<el-card>
													<p>{{$i+1}}:</p>
													<pre>{{ $comments[$i]->content }}</pre>
													<p>By {{ $comments[$i]->author_name }}</p>
													<el-button type="primary" icon="el-icon-edit" size="mini" @click="clickReply({{$i+1}})">Reply</el-button>
												</el-card>
												</el-timeline-item>
												@endfor
											</el-timeline>
										</div>
									</el-main>
									<el-main>
										<el-input
											type="textarea"
											:rows="4"
											placeholder="请输入内容"
											v-model="textarea"
											maxlength="120">
										</el-input>
									</el-main>
									<el-footer>
										<el-input style="width: 60%" placeholder="请输入内容" v-model="name" maxlength="12">
											<template slot="prepend">Name</template>
										</el-input>
										<el-button style="float:right; width: 20%" type="primary" @click="clickSubmit">Submit</el-button>
									</el-footer>
								</el-container>
							</el-main>
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
	<script src="{{URL::asset('assets/axios/dist/axios.min.js')}}"></script>
	<script>
		new Vue({
			el: '#app',
			data: {
				textarea: '',
				name: ''
			},
			methods: {
				clickReply: function(index) {
					this.textarea = 'Reply to Comment ' + index + ":" + "\n";
				},
				clickSubmit: function() {
					var _this = this;
					axios.post('{{url("/blog/comment")}}', {
						blog_id: {{ $blog->id }},
						comment: _this.textarea,
						name: _this.name
					})
					.then(function (response) {
						alert(response.data);
						location.reload();
					})
					.catch(function (error) {
						alert(error)
					});
				}
			}
		})

		
	</script>
</body>

</html>