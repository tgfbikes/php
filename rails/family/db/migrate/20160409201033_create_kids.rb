class CreateKids < ActiveRecord::Migration
  def change
    create_table :kids do |t|
      t.string :fname
      t.string :lname
      t.string :sex
      t.integer :age

      t.timestamps null: false
    end
  end
end
