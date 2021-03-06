<?php

namespace OFFLINE\Indirect\Updates;

use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

/**
 * Class AddTargetTypeColumnsToRedirectsTable
 *
 * @package OFFLINE\Indirect\Updates
 */
class AddTargetTypeColumnsToRedirectsTable extends Migration
{
    const TABLE = 'offline_indirect_redirects';

    public function up()
    {
        Schema::table(self::TABLE, function (Blueprint $table) {
            $table->string('target_type', 12)->default('path_or_url')->after('match_type');
            $table->string('cms_page')->nullable()->after('test_url');
            $table->string('static_page')->nullable()->after('cms_page');
        });
    }

    public function down()
    {
        Schema::table(self::TABLE, function (Blueprint $table) {
            $table->dropColumn(['cms_page', 'static_page']);
        });
    }
}
