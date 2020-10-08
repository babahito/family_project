<!-- <div class="nav">
            <ul class="nav_list">

                <li><a href="/kazoku">
                    <i class="fas fa-2x fa-smile-wink"></i><br>
                    Family</a></li>
                <li><a href="/user">
                    <i class="fas fa-users fa-2x icon_gray"></i><br>
                    Member</a></li>
                <li><a href="/post">
                    <i class="fas fa-book-reader fa-2x icon_gray"></i><br>
                    MY NOTE</a></li>
                <li><a href="/users/{{Auth::user()->name}}/likes">
                    <i class="fab fa-gratipay fa-2x icon_gray"></i><br>
                    Favorite</a></li>
            </ul>
        </div> -->



        <!-- <nav class="navbar navbar-expand-sm  navbar-dark mt-5"> -->
        <!-- <div class="collapse "> -->
            <ul class="navi-list">
            <a href="/kazoku"><li>
                    <i class="fas fa-smile-wink"></i><br>Family
                </li></a>
                <a href="/user"><li>
                    <i class="fas fa-users icon_gray"></i><br>Member
                </li></a>
                <a href="/post"><li>
                    <i class="fas fa-book-reader icon_gray"></i><br>MY NOTE
                </li></a>
                <a href="/users/{{Auth::user()->name}}/likes"><li>
                    <i class="fab fa-gratipay  icon_gray"></i><br>Favorite
                </li></a>
            </ul>
        </div>
    </nav>