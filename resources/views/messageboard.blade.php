<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="留言板, BLOG, 博客, IT, 计算机, 编程">
	<meta name="Description" Content="留言板">
	<title>留言板 to Azu機</title>
	<!-- import CSS -->
	<link rel="stylesheet" href="{{URL::asset('assets/element-ui/lib/theme-chalk/index.css')}}">
	<style>
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
					<el-col :span="4">
						<div class="grid-content bg-purple">
							<h2><el-link :underline="false" type="success" href="/">HomePage</el-link></h2>
						</div>
					</el-col>
					<el-col :span="16">
						<h2 style="text-align:center;" class="grid-content bg-purple">MessageBoard</h2>
					</el-col>
					<el-col :span="4" style="text-align: right">
						<div><el-link :underline="false" type="primary" target="_blank" href="https://twitter.com/c980129">Twitter</el-link></div>
						<div><el-link :underline="false" type="danger" target="_blank" href="https://weibo.com/cj980129">Weibo</el-link></div>
					</el-col>
				</el-row>
				<el-divider></el-divider>
			</el-header>
			<el-main>
				<el-row>
					<el-col :span="18" :offset="3">
						<div>
							<el-input
								type="textarea"
								:rows="4"
								placeholder="请输入内容"
								v-model="textarea"
								maxlength="120">
							</el-input>
						</div>
						<br>
						<div>
							<el-input style="width: 60%" placeholder="请输入内容" v-model="name" maxlength="12">
								<template slot="prepend">Name</template>
							</el-input>
							<el-button style="float:right; width: 20%" type="primary" @click="clickSubmit">Submit</el-button>
						</div>
						<div class="block" style="margin: 100px 0px 0px 0px">
							<el-timeline>
								@foreach ($messages as $message)
								<el-timeline-item timestamp="{{ $message->datetime }}" placement="top">
									<el-card>
									<pre>{{ $message->content }}</pre>
									<p>By {{ $message->author_name }}</p>
									</el-card>
								</el-timeline-item>
								@endforeach
							</el-timeline>
						</div>
					</el-col>
				</el-row>
			</el-main>
		</el-container>
	</div>
	<!-- import Vue before Element -->
	<script src="{{URL::asset('assets/vue/dist/vue.js')}}"></script>
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
				clickSubmit: function() {
					var _this = this;
					axios.post('{{url("/message")}}', {
						content: _this.textarea,
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