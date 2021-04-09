var vm = new Vue({
    el: '#app',
    data: {
        topHeight: '0px',
        cha_flag: 'rin_icon',
        cha_show: 1,
        cha_show_on: null,
        mp3: null,
        gallery_imgs: [],
        world_imgs: [],
        show_la: false,
        show_la1: false,
        la_src: '',
        la_index: 0,
        show_news: [],
        world_names: [],
        sm_src: '',
    },
    methods: {
        changeE: function() {
            //this.flag = !this.flag
            this.cha_show = this.cha_show == 5 ? 1 : this.cha_show + 1
        },

        click_voice: function(e) {
            if (this.mp3 != null) {
                this.mp3.pause();
            }
            var voice_id = e.target.id.split('_')[1]
            var cha = this.cha_flag.split('_')[0]
            if (cha == 'other') {
                cha = this.cha_show_on
            }
            var path = 'resource/character/sample_voice/' + cha + '/' + voice_id + '.wav'
            this.mp3 = new Audio(path);
            this.mp3.play();
        },

        mouseOver: function(e) {
            this.cha_show_on = e.target.id
        },

        mouseLeave: function(e) {
            this.cha_show_on = null
        },

        mouseOver2: function(e) {
            var dom = $('#' + e.target.id)
            var top = Number(dom.css('top').split('p')[0]) - 130
            var left = Number(dom.css('left').split('p')[0]) - 75
            this.sm_src = this.world_imgs[Number(e.target.id.split('_')[1])].sm
            this.la_index = Number(e.target.id.split('_')[1])
            var dom2 = $('#world_sm')
            var dom3 = $('#world_sm_img')
            var dom4 = $('#world_sm_p')
            dom2.css('z-index', '1')
            dom2.css('opacity', '1')
            dom2.css('top', top + 'px')
            dom2.css('left', left + 'px')
            dom3.css('z-index', '1')
            dom3.css('opacity', '1')
            dom3.css('top', top + 5 + 'px')
            dom3.css('left', left + 5 + 'px')
            dom4.css('z-index', '1')
            dom4.css('opacity', '1')
            dom4.css('top', top + 80 + 'px')
            dom4.css('left', left + Number(dom2.css('width').split('p')[0])/2 - this.world_names[this.la_index].length*16/2 + 'px')
        },

        mouseLeave2: function(e) {
            $('#world_sm').css('z-index', '-1')
            $('#world_sm').css('opacity', '0')
            $('#world_sm_img').css('z-index', '-1')
            $('#world_sm_img').css('opacity', '0')
            $('#world_sm_p').css('z-index', '-1')
            $('#world_sm_p').css('opacity', '0')
        },

        imgLarge: function(img_id) {
            this.show_la = true
            this.la_src = this.gallery_imgs[img_id].la
            this.la_index = img_id
        },

        nextImg: function() {
            this.la_index = this.la_index == this.gallery_imgs.length - 1 ? 0 : this.la_index + 1
            this.la_src = this.gallery_imgs[this.la_index].la
        },

        nextImgWo: function() {
            this.la_index = this.la_index == this.world_imgs.length - 1 ? 0 : this.la_index + 1
            this.la_src = this.world_imgs[this.la_index].la
        },

        woLarge: function(e) {
            var img_id = Number(e.target.id.split('_')[1])
            this.show_la1 = true
            this.la_src = this.world_imgs[img_id].la
            this.la_index = img_id
            console.log(this.world_names[this.la_index])
        },

        clickNews: function(e) {
            this.$set(this.show_news, e.target.parentElement.id, !this.show_news[e.target.parentElement.id])
        },

        clickNewsI: function(e) {
            window.open('news.html?id=' + e.target.parentElement.id)
        },

        click_icon: function(e) {
            this.cha_flag = e.target.id
            this.cha_show = 1
            if (this.cha_flag == 'other_icon') {
                $(".intro").height(2800)
            }
            else {
                $(".intro").height(700)
            }
        },

        // 获取导航栏高度
        getHeight: function() {
            this.topHeight =  $("#header").height() + 'px'
        },
    },
    created: function() {
        window.addEventListener("resize", this.getHeight);
        this.getHeight();

        this.world_names = [
            "弓張学園", "夢浮坂", "伯奇神社", "桜ヶ原駅", "喫茶キマイラ",
            "草薙直哉マンション", "雛弓海岸公園", "泪川町", "歌木駅", "小音羽町", "夏目家"
        ]

        for (var i = 0; i <= 10; i ++) {
            s0 = "resource/world/img/" + String(i) + ".png"
            s1 = "resource/world/img/" + String(i) + "_s.png"
            this.world_imgs.push({
                sm: s1,
                la: s0,
            })
        }

        for (var i = 1; i <= 9; i ++) {
            s0 = "resource/gallery/img/thumbnail0" + String(i) + ".jpg"
            s1 = "resource/gallery/img/image0" + String(i) + ".jpg"
            this.gallery_imgs.push({
                sm: s0,
                la: s1
            })
        }

        for (var i = 10; i <= 16; i ++) {
            s0 = "resource/gallery/img/thumbnail" + String(i) + ".jpg"
            s1 = "resource/gallery/img/image" + String(i) + ".jpg"
            this.gallery_imgs.push({
                sm: s0,
                la: s1
            })
        }

        for (var i = 1; i <= 6; i ++) {
            s0 = "resource/gallery/img/thumbnail_H_0" + String(i) + ".jpg"
            s1 = "resource/gallery/img/image_H_0" + String(i) + ".jpg"
            this.gallery_imgs.push({
                sm: s0,
                la: s1
            })
        }

        for (var i = 0; i < 6; i ++) {
            this.show_news.push(false)
        }
    },
    destroyed: function() {
        window.removeEventListener("resize", this.getHeight);
    }
})


$(document).ready(function(){
    var s = (window.location.href + '').split('?')
    if (s[1]) {
        s = (s[1] + '').split('=')
        if (s[0] == 'para') {
            $('html , body').animate({scrollTop: $('#' + s[1]).offset().top - 50 + 'px'}, 1000);
        }
        else {
            vm.$set(vm.show_news, Number(s[1]), true)
            $('html , body').animate({scrollTop: $('#' + s[1]).offset().top - 50 + 'px'}, 1000);
        }
    }
});