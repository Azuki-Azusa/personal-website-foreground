<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="BLOG, 博客, IT, 计算机, 编程">
	<meta name="Description" Content="Azu機个人博客">
	<title>Azu機 BlogList</title>
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
							<h2><el-link :underline="false" type="success" href="../">HomePage</el-link></h2>
						</div>
					</el-col>
					<el-col :span="16">
						<h2 style="text-align:center;" class="grid-content bg-purple">Azu機 BlogList</h2>
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
						<div class="block">
							<el-timeline>
								@foreach ($blogs as $blog)
								<el-timeline-item timestamp="{{ $blog->datetime }}" placement="top">
									<el-card>
										<h4>
											<el-link href="blog/{{ $blog->id }}" target="_blank">{{ $blog->title }}</el-link>
										</h4>
										<i class="el-icon-view"> {{ $blog->views }}</i>
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
	<script>
		new Vue({
			el: '#app',
		})
	</script>
</body>

</html>