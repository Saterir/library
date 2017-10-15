<?php
function xmldb_local_library_upgrade($oldversion) {
	global $DB;

	$dbman = $DB->get_manager(); // Loads ddl manager and xmldb classes.
	
    if ($oldversion < 2017101401) {

        // Define table local_library to be created.
        $table = new xmldb_table('local_library');

        // Adding fields to table local_library.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('userid', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
        $table->add_field('bookid', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
        $table->add_field('date', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table local_library.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for local_library.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Library savepoint reached.
        upgrade_plugin_savepoint(true, 2017101401, 'local', 'library');
    }

    
    
    if ($oldversion < 2017101500) {
    
    	// Define table book to be created.
    	$table = new xmldb_table('book');
    
    	// Adding fields to table book.
    	$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    	$table->add_field('name', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
    	$table->add_field('author', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
    	$table->add_field('year', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('editorial', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
    	$table->add_field('copies', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('tagone', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('tagtwo', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
    
    	// Adding keys to table book.
    	$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
    
    	// Conditionally launch create table for book.
    	if (!$dbman->table_exists($table)) {
    		$dbman->create_table($table);
    	}
    
    	// Library savepoint reached.
    	upgrade_plugin_savepoint(true, 2017101500, 'local', 'library');
    }
    
    if ($oldversion < 2017101501) {
    
    	// Define table book to be renamed to local_library_book.
    	$table = new xmldb_table('book');
    
    	// Launch rename table for local_library_book.
    	$dbman->rename_table($table, 'local_library_book');
    	
    	// Define table local_library_tag to be created.
    	$table = new xmldb_table('local_library_tag');
    	
    	// Adding fields to table local_library_tag.
    	$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    	$table->add_field('name', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
    	
    	// Adding keys to table local_library_tag.
    	$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
    	
    	// Conditionally launch create table for local_library_tag.
    	if (!$dbman->table_exists($table)) {
    		$dbman->create_table($table);
    	}
    
    	// Library savepoint reached.
    	upgrade_plugin_savepoint(true, 2017101501, 'local', 'library');
    }
    
    
    return true;
}