jQuery(document).ready(function () {
    jQuery('#add-another-skill').click(function (e) {
        e.preventDefault();

        var skillList = jQuery('#skill-fields-list');

        // grab the prototype template
        var newWidget = skillList.attr('data-prototype');
        // replace the "__name__" used in the id and name of the prototype
        // with a number that's unique to your skills
        // end name attribute looks like name="contact[skills][2]"
        newWidget = newWidget.replace(/__name__/g, skillCount);
        skillCount++;

        // create a new list element and add it to the list
        var newLi = jQuery('<li></li>').html(newWidget);
        newLi.appendTo(skillList);
    });
})