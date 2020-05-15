 <!-- Sidebar -->
 <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-light text-center">
      <img src="{{ asset('images/logo-white.png') }}" style="height:40px;">
      <h6>LMS</h6>
      </div>
      <div class="list-group list-group-flush">
      
        @role('Student')
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-tachometer pr-3" aria-hidden="true"></i>Dashboard</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-newspaper-o pr-3" aria-hidden="true"></i>News Feed</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-pencil pr-3" aria-hidden="true"></i>Activities</a>
        @endrole
          
        @role('Teacher')
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-tachometer pr-3" aria-hidden="true"></i>Dashboard</a>
          <a href="/lms/myposts" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-sticky-note pr-3" aria-hidden="true"></i>My Posts</a>
          <a href="/lms/myactivities" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-pencil pr-3" aria-hidden="true"></i>My Activities</a>
          <a href="/lms/mymcqs" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-list-ul pr-3" aria-hidden="true"></i>My MCQs</a>
          <a href="/lms/myquestions" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-question pr-3" aria-hidden="true"></i>My Questions</a>
          <a href="/lms/myarticles" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-file-text pr-3" aria-hidden="true"></i>My Articles</a>
        @endrole

        @role('LMS Admin')

        @endrole

        @role('SYS Admin')
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-tachometer pr-3 text-primary" aria-hidden="true"></i>Dashboard</a>
          <a href="/lms/users" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-users pr-3 text-warning" aria-hidden="true"></i>User Accounts</a>
          <a href="/lms/rolerequests" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-exclamation-circle pr-3 text-danger" aria-hidden="true"></i>Role Requests</a>
          <a href="/lms/posts" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-sticky-note text-success pr-3" aria-hidden="true"></i>Posts Moderation</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-pencil pr-3 text-success" aria-hidden="true"></i>Activities Moderation</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-list-ul pr-3 text-success" aria-hidden="true"></i>MCQ Moderation</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-question pr-3 text-success" aria-hidden="true"></i>Question Moderation</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-file-text pr-3 text-success" aria-hidden="true"></i>Articles Moderation</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-book pr-3 text-primary" aria-hidden="true"></i>Subjects</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-graduation-cap pr-3" aria-hidden="true"></i>Courses</a>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-trophy pr-3 text-warning" aria-hidden="true"></i>Competitions</a>
        @endrole

      </div>
    </div>
<!-- /#sidebar-wrapper -->