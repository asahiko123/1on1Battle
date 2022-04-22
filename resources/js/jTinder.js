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
        storeToSessionStorage('dislike',myCallback);
    },
    onLike: function(item){
        currentQuestionIndex++;
        checkQuestionNum();
        storeToSessionStorage('like',myCallback);

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

        const category = currentQuestionStatement(tasteList);
        const dataList = [];

        if(currentQuestionIndex === questionsNum){

            console.log('データリスト作成');

            let sessionData = {
                status : status
            }

           sessionStorage.setItem(category,JSON.stringify(sessionData));

        }else{

            console.log('データ追加')

            let sessionData = {
                status : status
            }

           sessionStorage.setItem(category,JSON.stringify(sessionData));

        }
}


var myCallback = function(){

    let elList;

    const statement = document.getElementsByClassName('userName');

    console.log(statement);

    const currentQuestionStatement = statement.item(questionsNum-currentQuestionIndex);

    console.log(questionsNum);
    console.log(currentQuestionIndex);
    console.log(currentQuestionStatement.innerHTML);
    console.log(tasteList);


    tasteList.forEach(el => {

        if(currentQuestionStatement.innerHTML.includes(el)){
            console.log(el);
            elList = el;
        }

    });

    console.log(elList);
    return elList;

}




