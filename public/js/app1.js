 $(document).ready(function() {
        $(".question-vote-up").click(function(){
            var a = $(this).children('a').attr('id');
            var voter = $('.username').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var el = parseInt($("#voteCount-" + a + ".vote_result").text());


            $("#voteCount-" + a + ".vote_result").hide();
            $("#loader-" + a + ".li_loader").show();
            $(this).children('a').css('color','#3f9809');
            $("#voteCount-" + a + ".vote_result").css('color','#3f9809');
            $(this).children('a').attr('id','');

            $.ajax({

                type: 'POST',
                url: '/oyVer',
                data: {
                    postid: a,
                    voteType: 1,
                    voter: voter,
                    _token: CSRF_TOKEN,
                    success:function (data) {
                        $("#voteCount-" + a + ".vote_result").text(el+1);
                        $("#loader-" + a + ".li_loader").hide();
                        $("#voteCount-" + a + ".vote_result").show();


                    }
                }
            })
        });

$(".question-vote-down").click(function(){
            var a = $(this).children('a').attr('id');
            var voter = $('.username').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var el = parseInt($("#voteCount-" + a + ".vote_result").text());


            $("#voteCount-" + a + ".vote_result").hide();
            $("#loader-" + a + ".li_loader").show();
            $(this).children('a').css('color','#980909');
            $("#voteCount-" + a + ".vote_result").css('color','#980909');
            $(this).children('a').attr('id','');

            $.ajax({

                type: 'POST',
                url: '/oyVer',
                data: {
                    postid: a,
                    voteType: 2,
                    voter: voter,
                    _token: CSRF_TOKEN,
                    success:function (data) {
                        $("#voteCount-" + a + ".vote_result").text(el-1);
                        $("#loader-" + a + ".li_loader").hide();
                        $("#voteCount-" + a + ".vote_result").show();


                    }
                }
            })
        });

$(".like_answers").click(function(){
            var a = $(this).children('a').attr('id');
            var voter = $('.username').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var el = parseInt($("#voteCount-" + a + ".vote_result").text());


            $("#commentVoteCount-" + a + ".vote_result").hide();
            $("#commentLoader-" + a + ".li_loader").show();
            $(this).children('a').css('color','#3f9809');
            $("#commentVoteCount-" + a + ".vote_result").css('color','#3f9809');
            $(this).children('a').attr('id','');

            $.ajax({

                type: 'POST',
                url: '/oyVer',
                data: {
                    postid: a,
                    voteType: 1,
                    voter: voter,
                    _token: CSRF_TOKEN,
                    success:function (data) {
                        $("#commentVoteCount-" + a + ".vote_result").text(el+1);
                        $("#commentLoader-" + a + ".li_loader").hide();
                        $("#commentVoteCount-" + a + ".vote_result").show();


                    }
                }
            })
        });

$(".dislike_answers").click(function(){
            var a = $(this).children('a').attr('id');
            var voter = $('.username').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var el = parseInt($("#commentVoteCount-" + a + ".vote_result").text());


            $("#commentVoteCount-" + a + ".vote_result").hide();
            $("#commentLoader-" + a + ".li_loader").show();
            $(this).children('a').css('color','#980909');
            $("#commentVoteCount-" + a + ".vote_result").css('color','#980909');
            $(this).children('a').attr('id','');

            $.ajax({

                type: 'POST',
                url: '/oyVer',
                data: {
                    postid: a,
                    voteType: 2,
                    voter: voter,
                    _token: CSRF_TOKEN,
                    success:function (data) {
                        $("#voteCount-" + a + ".vote_result").text(el-1);
                        $("#loader-" + a + ".li_loader").hide();
                        $("#voteCount-" + a + ".vote_result").show();


                    }
                }
            })
        });

    });
