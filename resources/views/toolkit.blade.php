<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="游戏, 工具, 手游, PCR">
	<meta name="Description" Content="Azu機工具集">
	<title>Azu機 Toolkit</title>
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
							<h2>
								<el-link :underline="false" type="success" href="/">HomePage</el-link>
							</h2>
						</div>
					</el-col>
					<el-col :span="16">
						<h2 style="text-align:center;" class="grid-content bg-purple">Toolkit By Azu機</h2>
					</el-col>
					<el-col :span="4" style="text-align: right">
						<div>
							<el-link :underline="false" type="primary" target="_blank"
								href="https://twitter.com/c980129">Twitter</el-link>
						</div>
						<div>
							<el-link :underline="false" type="danger" target="_blank" href="https://weibo.com/cj980129">
								Weibo</el-link>
						</div>
					</el-col>
				</el-row>
				<el-divider></el-divider>
			</el-header>
			<el-container>
				<el-aside width="200px" style="background-color: rgb(238, 241, 246)">
					<el-menu style="height:500px" @select="handleSelect" :default-openeds="['1']" default-active='1-1'>
						<el-submenu index="1">
							<template slot="title">プリコネR</template>
							<el-menu-item index="1-1">返回秒数</el-menu-item>
							<el-menu-item index="1-2">竞技场计时</el-menu-item>
						</el-submenu>
					</el-menu>
				</el-aside>
				<el-main v-if="show['1-1']">
					<el-row :gutter="20">
						<el-col :span="6"><el-card class="box-card">
							<div class="sub-title">造成伤害（万）</div>
							<el-divider></el-divider>
							<el-input type="number" v-model="data1.damage"></el-input>
						</el-card></el-col>
						<el-col :span="6"><el-card class="box-card">
							<div class="sub-title">剩余血量（万）</div>
							<el-divider></el-divider>
							<el-input type="number" v-model="data1.rest"></el-input>
						</el-card></el-col>
						<el-col :span="6"><el-card class="box-card">
							<div class="sub-title">尾刀返回秒数</div>
							<el-divider></el-divider>
							<el-input type="number" v-model="re" :readonly="true"></el-input>
						</el-card></el-col>
						<el-col :span="6"><el-card class="box-card">
							<div class="sub-title">白嫖所需伤害</div>
							<el-divider></el-divider>
							<el-input type="number" v-model="mix" :readonly="true"></el-input>
						</el-card></el-col>
					</el-row>
				</el-main>
				<el-main v-if="show['1-2']">
					<el-row :gutter="20">
						<el-col :span="8"><el-card class="box-card" style="height: 160px">
							<el-button type="primary" style="width:100%" @click="clickCount">开始300秒倒数</el-button>
							<el-divider>配置过差时可能有误差</el-divider>
							<div style="text-align:center">@{{ data2.countdown }}秒</div>
						</el-card></el-col>
						<el-col :span="8"><el-card class="box-card" style="height: 160px">
							<el-input type="number" v-model="data2.rest">
								<template slot="prepend">倒数剩</template>
								<template slot="append">秒时提醒</template>
							</el-input>
							<el-divider>打开将播放试听（音量注意）</el-divider>
							<div style="text-align: center;">
							<el-switch
								@change="switchOn"
								v-model="data2.value1"
								active-text="开"
								inactive-text="关">
							</el-switch>
							<audio id="audio" src="{{URL::asset('assets/sound/warning2.mp3')}}"></audio>
							</div>
						</el-card></el-col>
						<el-col :span="8"><el-card class="box-card" style="height: 160px">
							<div style="text-align: center;" class="sub-title">当前终端时间</div>
							<el-divider></el-divider>
							<div style="text-align:center">@{{ data2.time }}</div>
						</el-card></el-col>
					</el-row>
				</el-main>
			</el-container>
		</el-container>
	</div>
	<!-- import Vue before Element -->
	<script src="{{URL::asset('assets/vue/dist/vue.js')}}"></script>
	<!-- import JavaScript -->
	<script src="{{URL::asset('assets/element-ui/lib/index.js')}}"></script>
	<script>
		new Vue({
			el: '#app',
			data: {
				timer: null,
				timer2: null,
				index: '1-1',
				show: {
					'1-1': true,
					'1-2': false
				},
				data1: {
					damage: 0,
					rest: 0,
				},
				data2: {
					countdown: 300,
					value1: false,
					rest: 20,
					time: ""
				}
			},
			methods: {
				handleSelect(index, indexPath) {
					if (this.timer2) clearInterval(this.timer2);
					this.show[this.index] = false;
					this.show[index] = true;
					this.index = index

				},
				clickCount() {
					if (this.timer2) clearInterval(this.timer2);
					this.data2.countdown = 300;
					this.timer2 = setInterval(this.countdown, 1000);
				},
				startTime() {
					var today = new Date()
					var h = today.getHours()
					var m = today.getMinutes()
					var s = today.getSeconds()
					// add a zero in front of numbers<10
					m = m < 10 ? "0" + m : m;
					s = s < 10 ? "0" + s : s;
					this.data2.time = h + ":" + m + ":" + s
				},
				countdown() {
					this.data2.countdown --;
					if (this.data2.value1 && this.data2.countdown == this.data2.rest) {
						this.audioPlay();
					}
					if (this.data2.countdown == 0) clearInterval(this.timer2);
				},
				audioPlay() {
					var audio = document.getElementById("audio");
					audio.play();
				},
				switchOn(value) {
					if (value == true) this.audioPlay();
				}
			},
			computed: {
				re: function() {
					return (1 - this.data1.rest / this.data1.damage) * 90 + 20; 
				},
				mix: function() {
					return this.data1.rest / (1 - 70 / 90);
				}
			},
			mounted() {
				this.timer = setInterval(this.startTime, 100);
			},
			beforeDestroy() {
				clearInterval(this.timer);
				if (this.timer2) clearInterval(this.timer2);
			}
		})
	</script>
</body>

</html>