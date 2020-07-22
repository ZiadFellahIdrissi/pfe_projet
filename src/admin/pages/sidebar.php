<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block" id="Mysidebar" >
    <div class="logo" style="text-align: center;">
        <a href="../pages/">
            <img src="../../../img/logo/fcc0.png" style="width: 160px;" alt="FCC"  />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li >
                    <a href="../pages">
                        <i class="fas fa-tachometer-alt" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="../Enseignants">
                        <span><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i></span>Enseignants
                    </a>
                </li>
                <li>
                    <a href="../Responsables">
                        <span><i class="fas fa-user-tie" aria-hidden="true"></i></span>Responsables
                    </a>
                </li>
                <li>
                    <a href="../Filieres">
                        <span><i class="fas fa-university" aria-hidden="true"></i></span>Filières
                    </a>
                </li>
                <li>
                    <a href="../Modules">
                        <span><i class="fab fa-stack-overflow" aria-hidden="true"></i></span>Modules
                    </a>
                </li>
                <li>
                    <a href="../Etudiants">
                        <i class="fas fa-user-graduate" aria-hidden="true"></i>Etudiants
                    </a>
                </li>
                <li>
                    <a href="../Notes">
                        <i class="fas fa-copy" aria-hidden="true"></i>Notes
                    </a>
                </li>
                <li>
                    <a href="../ExamFinale">
                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>Calendrier des exams
                    </a>
                </li>
                <li>
                    <a href="../Demandes">
                        <i class="fa fa-bars" aria-hidden="true"></i>Demandes 
                    </a>
                </li>
                <li>
                    <a href="../Semestre">
                        <i class="fa fa-columns" aria-hidden="true"></i>Semestre
                    </a>
                </li>
                <li>
                    <a href="../Salle">
                        <i class="fa fa-th" aria-hidden="true"></i>Salles 
                    </a>
                </li>
                <li>
                    <a href="#">
                        
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<script src="../../../layout/js/jquery-3.4.1.min.js "></script>
    <script>
        $(function() {
            let path = location.href;
            let lien =path.split('/');
            let finalpath =lien[lien.length-2];
            console.log(finalpath);
        
            $("a[href='../" + finalpath + "']").parent().addClass('active');
                })
    </script>
