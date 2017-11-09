@extends('layouts.panel.panel')
@section("subtitle") - مدیریت کاربران @endsection
@section("header")
    <script src="{{asset('app/controllers/users.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div ng-controller="usersCtrl">
        <div class="row" >

        </div>

        <div class="table-responsive" >
            <table class="table table-striped">
                <tr>
                    <th> نام و نام خانوادگی</th>
                    <th>شماره تماس</th>
                    <th>ایمیل</th>
                    <th>نقش</th>
                    <th>اعمال</th>
                </tr>
                <tr ng-repeat="user in users">
                    <td><%user.profile.name%><%user.profile.last_name%></td>

                    <td><%user.profile.phone%></td>
                    <td><%user.email%></td>
                    <td><%user.role%></td>
                    <td>

                        <a href="#" class="btn btn-info"  data-toggle="modal" data-target="#changeRoleModal" ng-click="setUserId(user.id)">تغییر مجوز</a>

                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" ng-click="setUserId(user.id)">حذف</a>
                    </td>
                </tr>

            </table>
        </div>
        <h1></h1>
        <!-- Modal -->
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">حذف کاربر</h4>
                    </div>
                    <div class="modal-body">
                        <p>آیا از حذف این کاربر اطمینان دارید؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="delete(user_id)">حذف</button>
                    </div>
                </div>





            </div>
        </div>


        <div id="changeRoleModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تغییر مجوز</h4>
                    </div>
                    <div class="modal-body">
                        <p>مجوز کاربر را انتخاب کنید:</p>
                        <select class="form-control" ng-model="roles">
                            <option value="ROLE_USER">کاربر عادی</option>
                            <option value="ROLE_MODERATOR">کاربر ویژه</option>
                            <option value="ROLE_ADMIN">مدیر</option>
                            <option value="ROLE_SUPPORT">پشتیبان</option>
                            <option value="ROLE_‌BLOCKED">مسدود</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="upgrade(user_id,roles)">تغییر</button>
                    </div>
                </div>





            </div>
        </div>






@endsection
@section("panelUsers")
    active
@endsection