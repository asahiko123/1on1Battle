sessionStorage.clear();
let currentQuestionIndex = 0;

let postReaction = function(category,reaction){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

        }
    });

    $.ajax({
        type:"POST",
        url:"api/search",
        data: {
            category: category,
            status: reaction
        },
        success:function(j_data){
            console.log('success');
        }
    })
}



$("#tinderslide").jTinder({
    onDislike: function(item){
        currentQuestionIndex++;
        storeToSessionStorage('dislike',myCallback);
        checkQuestionNum();

    },
    onLike: function(item){
        currentQuestionIndex++;
        storeToSessionStorage('like',myCallback);
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



function storeToSessionStorage(status,currentQuestionStatement){

        const category = currentQuestionStatement(tasteList);
        const dataList = [];

        console.log('データ追加')

        let sessionData = {
            status : status
        }

        sessionStorage.setItem(category,JSON.stringify(sessionData));
        postReaction(category,status);

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




