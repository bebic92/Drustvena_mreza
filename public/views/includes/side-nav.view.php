<div class="main-container">
    <div class="side-nav__container">
        <div class="side-nav__user-details">
            <div class="side-nav__user-profile-pic">
                <img src="public/img/user_profile.jpg">
            </div>
            <div class="side-nav__user-info">
                <span class="side-nav__user-details__full-name">Marin Bebić</span>
                <span class="side-nav__user-details__username">@marin.bebic</span>
            </div>                
        </div>
        <nav class="side-nav">
            <ul class="side-nav__items">
                <li class="side-nav__item">
                    <span class="side-nav__item__title">Objave</span>
                    <span class="side-nav__item__number"><?= $userPosts->num_of_posts ?></span>
                </li>
                <li class="side-nav__item">
                    <span class="side-nav__item__title">Slijedim</span>
                    <span class="side-nav__item__number">142</span>
                </li>
                <li class="side-nav__item">
                    <span class="side-nav__item__title">Pratitelji</span>
                    <span class="side-nav__item__number">113</span>                        
                </li>
            </ul>
        </nav>
  </div>
  <main>