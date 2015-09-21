<div class="page-header">
    <h1>Random Character Maker</h1>
</div>

<div class="row">
    <div class="col-sm-12">
        {{ form('action': '.', 'method': 'post') }}
        <input type="hidden" name="call_action" value="generate_all">
        <input type="hidden" name="token" value="{{ security.getToken() }}">
        {{ submit_button('GENERATE ALL') }}
        {{ end_form() }}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        {{ form('action': '.', 'method': 'post') }}
        <input type="hidden" name="call_action" value="generate_another_name">
        <input type="hidden" name="token" value="{{ security.getToken() }}">
        {{ submit_button('ANOTHER NAME') }}
        {{ end_form() }}
    </div>
    <div class="col-sm-8">
        {% if anotherNames is empty %}
            <p>-</p>
        {% else %}
            {% for anotherName in anotherNames %}
                <p>{{ anotherName }}</p>
            {% endfor %}
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        {{ form('action': '.', 'method': 'post') }}
        <input type="hidden" name="call_action" value="generate_personality">
        <input type="hidden" name="token" value="{{ security.getToken() }}">
        {{ submit_button('PERSONALITY') }}
        {{ end_form() }}
    </div>
    <div class="col-sm-8">
        {% if personalities is empty %}
            <p>-</p>
        {% else %}
            {% for personality in personalities %}
                <p>{{ personality }}</p>
            {% endfor %}
        {% endif %}
    </div>
</div>
