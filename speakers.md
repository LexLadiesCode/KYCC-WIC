---
layout: post
title: Speakers
permalink: /speakers/
---

{% for post in site.categories.speakers reversed %}      
  <h3><a href="{{ post.url }}">{{ post.title }}</a>, {{ post.company }}</h3>
{% endfor %}