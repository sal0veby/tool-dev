<?php

use Illuminate\Database\Seeder;

class StepFlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '1',
            'state_next_id' => '2',
            'process_before_id' => '1',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '1', // Create Job
            'state_next_id' => '2', // Confirm or Approve
            'process_before_id' => '1', // Create Job
            'state_before_id' => '1', // Open
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '2',
            'state_next_id' => '1',
            'process_before_id' => '1',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '2', // Step 2
            'state_next_id' => '1', // Save
            'process_before_id' => '1', // Create Job
            'state_before_id' => '2', // Confirm or Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '2',
            'state_next_id' => '2',
            'process_before_id' => '2',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '2', // Step 2
            'state_next_id' => '2', // Approve
            'process_before_id' => '2', // Step 2
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '3',
            'state_next_id' => '1',
            'process_before_id' => '2',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '3', // Step 3
            'state_next_id' => '1', // Save
            'process_before_id' => '2', // Step 2
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '3',
            'state_next_id' => '2',
            'process_before_id' => '3',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '3', // Step 3
            'state_next_id' => '2', // Approve
            'process_before_id' => '3', // Step 3
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '4',
            'state_next_id' => '1',
            'process_before_id' => '3',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '4', // Step 4
            'state_next_id' => '1', // Save
            'process_before_id' => '3', // Step 3
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '4',
            'state_next_id' => '2',
            'process_before_id' => '4',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '4', // Step 4
            'state_next_id' => '2', // Approve
            'process_before_id' => '4', // Step 4
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '5',
            'state_next_id' => '1',
            'process_before_id' => '4',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '5', // Step 5
            'state_next_id' => '1', // Save
            'process_before_id' => '4', // Step 4
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '5',
            'state_next_id' => '2',
            'process_before_id' => '5',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '5', // Step 5
            'state_next_id' => '2', // Approve
            'process_before_id' => '5', // Step 5
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '6',
            'state_next_id' => '1',
            'process_before_id' => '5',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '6', // Step 6
            'state_next_id' => '1', // Save
            'process_before_id' => '5', // Step 5
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '6',
            'state_next_id' => '2',
            'process_before_id' => '6',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '6', // Step 6
            'state_next_id' => '2', // Approve
            'process_before_id' => '6', // Step 6
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '7',
            'state_next_id' => '1',
            'process_before_id' => '6',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '7', // Step 7
            'state_next_id' => '1', // Save
            'process_before_id' => '6', // Step 6
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '7',
            'state_next_id' => '2',
            'process_before_id' => '7',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '7', // Step 7
            'state_next_id' => '2', // Approve
            'process_before_id' => '7', // Step 7
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '8',
            'state_next_id' => '1',
            'process_before_id' => '7',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '8', // Step 8
            'state_next_id' => '1', // Save
            'process_before_id' => '7', // Step 7
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '8',
            'state_next_id' => '2',
            'process_before_id' => '8',
            'state_before_id' => '1',
        ], [
            'process_next_id' => '8', // Step 8
            'state_next_id' => '2', // Approve
            'process_before_id' => '8', // Step 8
            'state_before_id' => '1',  // Save
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '9',
            'state_next_id' => '1',
            'process_before_id' => '8',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '9', // Step 9
            'state_next_id' => '1', // Save
            'process_before_id' => '8', // Step 8
            'state_before_id' => '2',  // Approve
        ]);

        DB::table('step_flows')->updateOrInsert([
            'process_next_id' => '10',
            'state_next_id' => '-2',
            'process_before_id' => '9',
            'state_before_id' => '2',
        ], [
            'process_next_id' => '10', // Step 9
            'state_next_id' => '-2', // Success
            'process_before_id' => '9', // Step 8
            'state_before_id' => '2',  // Approve
        ]);
    }
}
