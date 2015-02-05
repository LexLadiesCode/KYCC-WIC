---
layout: post
title: Sponsors
permalink: /sponsors/
---
<div class="col-md-12">
  <p>If you are interested in being a sponsor for KYCC-WiC, please contact Cindy Tucker, <a href="mailto:cindy.tucker@kctcs.edu">cindy.tucker@kctcs.edu</a>, or Melanie Williamson, <a href="mailto:melanie.williamson@kctcs.edu">melanie.williamson@kctcs.edu</a>.
  </p>
</div>

<div class="row">
  <div class="col-md-12">
  
    <h3>Platinum Level - $2500</h3>
    <ul>
    {% for post in site.categories.sponsors reversed %}
      {% if post.level contains "platinum" %}
        <li>{{ post.title }}</li>
      {% endif %}
    {% endfor %}
    </ul>
    
    <h3>Gold Level - $1000</h3>
    <ul>
    {% for post in site.categories.sponsors reversed %}
      {% if post.level contains "gold" %}
        <li>{{ post.title }}</li>
      {% endif %}
    {% endfor %}
    </ul>
    
    <h3>Silver Level - $500</h3>
    <ul>
    {% for post in site.categories.sponsors reversed %}
      {% if post.level contains "silver" %}
        <li>{{ post.title }}</li>
      {% endif %}
    {% endfor %}
    </ul>
    
    <h3>Bronze Level - $250</h3>
    <ul>
    {% for post in site.categories.sponsors reversed %}
      {% if post.level contains "bronze" %}
        <li>{{ post.title }}</li>
      {% endif %}
    {% endfor %}
    </ul>
    
    <h3>Friends of the Conference - up to $250</h3>
    <ul>
    {% for post in site.categories.sponsors reversed %}
      {% if post.level contains "friend" %}
        <li>{{ post.title }}</li>
      {% endif %}
    {% endfor %}
    </ul>
    
  </div>
</div>