<div class="row">
    <div class="col-sm-12">
        <p>ファンタジー世界のキャラクターをランダムに生成します。</p>
    </div>
</div>
{{ form('action': 'fantasy', 'method': 'post') }}
<div class="row">
    <div class="col-sm-12">
        <input type="hidden" name="call_action" value="generate_all">
        <input type="hidden" name="token" value="{{ security.getToken() }}">
        {{ submit_button('GENERATE') }}
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <?php
        echo $this->tag->select(
        array(
        'race',
        MasterRaces::find(["world_type='fantasy' AND is_available = TRUE", 'order' => 'id']),
        'using' => array('race_id', "body_ja"),
        'useEmpty' => false,
        'width' => 150,
        'style' => 'width: 150px'
        )
        );
        ?>
        <?php
        echo  $this->tag->select(
        array(
        'gender',
        MasterGenders::find("is_available = TRUE"),
        'using' => array('gender_id', "body_ja"),
        'useEmpty' => false,
        'width' => 150,
        'style' => 'width: 150px'
        )
        );
        ?>
        <?php
        echo  $this->tag->select(
        array(
        'range_of_age',
        MasterAges::find(["world_type='fantasy' AND is_available = TRUE", 'group' => 'age_id', 'order' => 'id']),
        'using' => array('age_id', "body_ja"),
        'useEmpty' => false,
        'width' => 150,
        'style' => 'width: 150px'
        )
        );
        ?>
    </div>
</div>
{{ end_form() }}

<hr>

<div class="row">
    <div class="col-sm-4">
        <p>造語</p>
    </div>
    <div class="col-sm-8">
        {% if coinagesLatin is empty %}
            <p>-</p>
        {% else %}
            <p>
                【Latin】
                <br>
                {#{{ coinagesLatin['prefix']['body'] }}{{ coinagesLatin['stem']['body'] }} / {{ coinagesLatin['stem']['body'] }}{{ coinagesLatin['suffix']['body'] }} / {{ coinagesLatin['prefix']['body'] }}{{ coinagesLatin['suffix']['body'] }}#}
                {{ coinagesLatin['prefix']['body'] }} + {{ coinagesLatin['suffix']['body'] }}
                <br>
                {{ coinagesLatin['prefix']['mean'] }} + {{ coinagesLatin['suffix']['mean'] }}
            </p>
        {% endif %}
        {% if coinagesEnglish is empty %}
            <p>-</p>
        {% else %}
            <p>
                【English】
                <br>
                {#{{ coinagesEnglish['prefix']['body'] }}{{ coinagesEnglish['stem']['body'] }} / {{ coinagesEnglish['stem']['body'] }}{{ coinagesEnglish['suffix']['body'] }} / {{ coinagesEnglish['prefix']['body'] }}{{ coinagesEnglish['suffix']['body'] }}#}
                {{ coinagesEnglish['prefix']['body'] }} + {{ coinagesEnglish['suffix']['body'] }}
                <br>
                {{ coinagesEnglish['prefix']['mean'] }} + {{ coinagesEnglish['suffix']['mean'] }}
            </p>
        {% endif %}
        {#【word + suffix】/【prefix + word】#}
        {#【prefix + stem】/【stem + suffix】/【prefix + suffix】#}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>DWARF</p>
    </div>
    <div class="col-sm-8">
        {% if dwarfName is empty %}
            <p>-</p>
        {% else %}
            <p>{{ dwarfName['first']['body'] }} = {{ dwarfName['family']['body'] }}</p>
            <p>{{ dwarfName['first']['body_ja'] }} = {{ dwarfName['family']['body_ja'] }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>ELF</p>
    </div>
    <div class="col-sm-8">
        {% if elfName is empty %}
            <p>-</p>
        {% else %}
            <p>{{ elfName['first']['body'] }}</p>
            <p>{{ elfName['first']['body_ja'] }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>HUMAN</p>
    </div>
    <div class="col-sm-8">
        {% if humanName is empty %}
            <p>-</p>
        {% else %}
            <p>{{ humanName['first'].body }} = {{ humanName['family'].body }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>GENDER</p>
    </div>
    <div class="col-sm-8">
        {% if gender is empty %}
            <p>-</p>
        {% else %}
            <p>{{ gender }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>AGE</p>
    </div>
    <div class="col-sm-8">
        {% if age is not defined %}
            <p>-</p>
        {% else %}
            <p>{{ age }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>種族</p>
    </div>
    <div class="col-sm-8">
        {% if race is empty %}
            <p>-</p>
        {% else %}
            <p>{{ race.body_ja }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>属性</p>
    </div>
    <div class="col-sm-8">
        {% if alignment is empty %}
            <p>-</p>
        {% else %}
            <p>{{ alignment.body_ja }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>職業</p>
    </div>
    <div class="col-sm-8">
        {% if job is empty %}
            <p>-</p>
        {% else %}
            <p>{{ job.body_ja }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>見た目</p>
    </div>
    <div class="col-sm-8">
        {% if looksMetaphorWord is empty %}
            <p>
                【体格】
                <br>
                -
                <br>
                -
            </p>
            {#<p>【身長】-</p>#}
            {#<p>【体重】-</p>#}
        {% else %}
            <p>
                【体格】
                <br>
                {{ looksMetaphorWord.body_ja }}
                <br>
                {{ looksMetaphorWord.description }}
            </p>
        {% endif %}
        <p>【髪型】-</p>

        <p>【髪の色】-</p>

        <p>【目の色】-</p>

        <p>【肌の色】-</p>
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>装備</p>
    </div>
    <div class="col-sm-8">
        {% if anotherNames is empty %}
            <p>【武器】-</p>
            <p>【防具】-</p>
            <p>【その他】-</p>
        {% else %}
            {#nothing to do#}
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>PERSONALITY</p>
    </div>
    <div class="col-sm-8">
        {% if personalities is empty %}
            <p>【生まれ】-</p>
            <p>【きっかけ】-</p>
            <p>【大切なもの】-</p>
            <p>【得意】-</p>
            <p>【苦手】-</p>
        {% else %}
            {#nothing to do#}
        {% endif %}
    </div>
</div>

<br>