import React from 'react';

const Dashboard: React.FC = () => {
  return (
    <div>
      <h1 className="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>
      
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        {/* Stats Cards */}
        {[
          { title: 'Total Files', value: '0', icon: '📁', color: 'blue' },
          { title: 'Messages', value: '0', icon: '💬', color: 'green' },
          { title: 'Tasks', value: '0', icon: '✓', color: 'yellow' },
          { title: 'Meetings', value: '0', icon: '📅', color: 'purple' },
        ].map((stat, index) => (
          <div key={index} className="bg-white rounded-lg shadow p-6">
            <div className="flex items-center justify-between">
              <div>
                <p className="text-sm font-medium text-gray-600">{stat.title}</p>
                <p className="text-3xl font-bold text-gray-900 mt-2">{stat.value}</p>
              </div>
              <div className={`text-4xl bg-${stat.color}-100 p-3 rounded-lg`}>
                {stat.icon}
              </div>
            </div>
          </div>
        ))}
      </div>

      {/* Welcome message */}
      <div className="bg-white rounded-lg shadow p-6">
        <h2 className="text-xl font-semibold text-gray-900 mb-4">Welcome to IHH CRM</h2>
        <p className="text-gray-600">
          This is your dashboard. Use the sidebar to navigate to different sections.
        </p>
      </div>
    </div>
  );
};

export default Dashboard;
