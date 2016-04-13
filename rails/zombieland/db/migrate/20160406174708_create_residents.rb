class CreateResidents < ActiveRecord::Migration
  def change
    create_table :residents do |t|
      t.string :name
      t.integer :recruitment_tally
      t.string :date_of_undeath
      t.string :date
      t.boolean :on_diet
      t.string :picture

      t.timestamps null: false
    end
  end
end
