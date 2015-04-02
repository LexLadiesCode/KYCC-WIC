---
layout: post
title: Agenda
permalink: /agenda/
---


<div id="agenda" class="col-md-12">
{% for agenda_hash in site.data.agenda %}
  {% assign agenda = agenda_hash[1] %}
  
  <div class="row">
    <hr />
    
    <div class="col-md-12">
      <h3>{{ agenda.readable-date }}</h3>
    </div>
  </div>
  
  {% for times in agenda.times %}
    <div class="row">
    <hr />
      <div id="time" class="col-md-2">
        <p>{{ times.start }} to {{ times.end }}</p>
      </div>
      <div class="col-md-10">
        <div class="row">
          {% assign count = times.sessions | size %}
          {% assign size = 12 | divided_by: count %}
          {% for session in times.sessions %}
              <div class="col-md-{{ size }}">
                <h3>{{ session.title }} <small>{{ session.subtitle }}</small></h3> 
                <span class="label label-primary"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> {{ session.location }} </span>           
                {% for speaker in session.speakers %}
                  <p class="speaker">
                    {% assign speaker_url = "#" %}
                    {% for post in site.categories.speakers %}
                      {% if post.title contains speaker.name %}
                        {% assign speaker_url = post.url %}
                      {% endif %}
                    {% endfor %}
                    <a href="{{ speaker_url }}">{{ speaker.name }}</a>
                    {% if speaker.title %}<small class="title">{{ speaker.title }}{% if speaker.department %}, {% endif %}                    
                      {% if speaker.department %}{{ speaker.department }}{% endif %}
                      </small>
                    {% endif %}
                    {% if speaker.company %}<small class="company">{{ speaker.company }}</small>{% endif %}
                  </p>
                {% endfor %}
              </div>
          {% endfor %}
        </div>
      </div>
    </div>
  {% endfor %}

{% endfor %}
</div>

