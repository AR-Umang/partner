////////////////////////////////////////////////29-12-2021//////////////////////////////////////////

//>>>>>>>>>>>>>>>>>>>>>>>>pagination for the user list page<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
let limitPerPage = 10;
let currentPage;

function userTablePagination(){

    let totalNumberOfUserTableRow = $(".user-table-row").length;
    let limitPerPage = 10;
    $(".user-table-row:gt(" + (limitPerPage-1) + ")").hide();
    let totalNumberOfPages = Math.ceil(totalNumberOfUserTableRow / limitPerPage);
    let currentPage = 1;

    // this is the pagination part 
    $(".user-table-pagination").append(`<li class="page-item" id="prevButton"><a class="page-link" href="javascript:void(0)">Prev</a></li>`)

    $(".user-table-pagination").append(`<li class="page-item active current-page"><a class="page-link" href="javascript:void(0)" id="pageNumber">1</a></li>`)
    

    $(".user-table-pagination").append(`<li class="page-item" id="nextButton"><a class="page-link" href="javascript:void(0)">Next</a></li>`)


    $(".user-table-pagination li#nextButton").on("click",function(){
        
        if(totalNumberOfPages === currentPage){
            return false;
        }else{
            currentPage++;
            $("#pageNumber").text(`${currentPage}`);
            $(".user-table-row").hide();
            let grandTotal = limitPerPage * currentPage;
            for (let i= grandTotal - limitPerPage; i< grandTotal; i++){
                $(".user-table-row:eq(" + i + ")").show()
            }
        }
    })

    $(".user-table-pagination li#prevButton").on("click",function(){
        if(currentPage === 1){
            return false;
        }else{
            currentPage--;
            $("#pageNumber").text(`${currentPage}`);
            $(".user-table-row").hide();
            let grandTotal = limitPerPage * currentPage;
            for (let i= grandTotal - limitPerPage; i< grandTotal; i++){
                $(".user-table-row:eq(" + i + ")").show()
            }
        }
    })

}

function firstPagePagination(){
    let totalNumberOfUserTableRow = $(".user-table-row").length;
    let limitPerPage = 10;
    $(".user-table-row:gt(" + (limitPerPage-1) + ")").hide();
}