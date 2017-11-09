@section('header')
    <script src="{{asset('app/controllers/articles.js')}}" type="text/javascript"></script>

@endsection
@section('content')
    <div  ng-controller="articlesCtrl">
        <div class="row" >

        </div>

        <div >
            <table class="table table-striped">
                <tr>
                    <th>ردیف</th>
                    <th>موضوع</th>
                    <th>کاربر</th>

                    <th>اعمال</th>
                </tr>
                <tr ng-repeat="article in articles">
                    <td><% $index+1 %></td>
                    <td><a href="/article/<% article.id %>"> <% article.subject %></a></td>
                    <td><% article.user_name %></td>

                    <td>

                        <a href="/web/moderator/article/modify/<% article.id %>" class="btn btn-info" >بروزرسانی</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" ng-click="setPostId(article.id)">حذف</a>
                    </td>
                </tr>

            </table>
            <div class="row">
                <div class="col-lg-2"><a href="{{route("addPage")}}" class="btn btn-success" >مقاله جدید</a></div>
            </div>
        </div>
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">حذف مقاله</h4>
                    </div>
                    <div class="modal-body">
                        <p>آیا از حذف این مقاله اطمینان دارید؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="deleteArticle(post_id)">حذف</button>
                    </div>
                </div>





            </div>
        </div>
    </div>




@endsection