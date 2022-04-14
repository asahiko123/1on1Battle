let currentQuestionIndex = 0;


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
        currentQuestionIndex++;
        checkQuestionNum();
        storeToSessionStorage('like',myCallback);
    },
    onLike: function(item){
        currentQuestionIndex++;
        checkQuestionNum();
        storeToSessionStorage('dislike',myCallback);

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

        sessionStorage.clear();
    }
}



function storeToSessionStorage(status,currentQuestionStatement){
    console.log('セッション');
    // let dataList = [];
    
        if(status === 'like'){

            let sessionData = {
                category: currentQuestionStatement(tasteList),
                status : status
            }

            sessionStorage.setItem('data',sessionData);
            
        }else{
            
            let sessionData = {
                category: currentQuestionStatement(tasteList),
                status : status
            }
           sessionStorage.setItem('data',sessionData);
            
        }
}


var myCallback = function(list){

    const statement = document.getElementsByClassName('userName');

    console.log(statement);
    
    const currentQuestionStatement = statement.item((questionsNum-1)-currentQuestionIndex);

    console.log(questionsNum);
    console.log(currentQuestionIndex);
    console.log(currentQuestionStatement.innerHTML);


    console.log(list);
    list.forEach(el => {

        if(currentQuestionStatement.innerHTML.includes(el)){
            console.log(el);
            return el;
        }

    });

    return;
    
}




