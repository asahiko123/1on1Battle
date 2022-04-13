let currentQuestionIndex = 0;
console.log('aaa');
let postReaction = function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

        }
    });

    $.ajax({
        type:"POST",
        url:"api/like"
    })
}



$("#tinderslide").jTinder({
    onDislike: function(item){
        console.log(item);
        currentQuestionIndex++;
        checkQuestionNum();
    },
    onLike: function(item){
        currentQuestionIndex++;
        checkQuestionNum();

    }
});
$('.actions .like, .actions .dislike').click(function(e){
    e.preventDefault();
    $("#tinderslide").jTinder($(this).attr('class'));
});

function checkQuestionNum(){
    if(currentQuestionIndex === questionsNum){
        $("#tinderslide").css('display','none');
        $("#resultForm").css('display','block');
    }
}
